<?php

namespace Store\Controller;

use Think\Controller;
use Org\Util\GeoHelper;
use Org\Net\Curl;

/**
 * 本类负责微信相关的处理方法汇总
 * 主要处理微信会话界面的上下行事件和消息
 * （1）微信调用：
 * 调用此类必备四个固定 GET 参数 signature, nonce, timestamp
 * 使用 nonce, timestamp 参数结合微信颁发的appkey来校验 signature 是否正确合法
 * 微信服务器调用此类时，主要发送 event 事件和消息内容
 * 
 * 本类主要负责处理全部在微信端能够显示或者被粉丝看到的页面和处理逻辑
 * 主要包含微站和微店的处理
 * 另外微信服务器的回调和数据推送也在这里
 * 
 * 在构造函数中会有访问方式的判断
 * 判断是进入微店访问还是微站访问
 * IMPORTANT: 操作参数均以 get 方式传入，例如辨别是访问微站还是微店，微店的id等
 * IMPORTANT: 内容参数无特殊情况以 post 方式传入，例如微店会员登录的表单
 * @category Wechat
 * @package Wechat
 * @author guanxuejun <guanxuejun@gmail.com>
 * @copyright 上海熔意网络科技有限公司 <http://tianxiarongtong.com>
 *
 */
class WechatApiController extends Controller {

    private $postStr;
    private $isEncrypt;
    private $postObj;
    private $openID;
    private $serviceID;
    private $msgType;
    private $content;
    private $createTime;
    private $eventKey;
    private $msgID;
    private $date;
    private $errorOpenid = '1234567890';

    function __construct() {
        parent::__construct();
        $this->date = date('YmdHis');
    }

    function index() {
        // 微信服务器回调方法
        $GLOBALS = F('global');
        $tmpArr = array(C('wechat.token'), I('get.timestamp'), I('get.nonce'));
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode('', $tmpArr);
        $tmpStr = sha1($tmpStr);
        if ($tmpStr == I('get.signature')) {
            if (isset($_GET["echostr"])) {
                echo $_GET["echostr"];
                exit;
            };
        } else {
            $errorArray = array();
            $errorArray['open_id'] = $this->errorOpenid;
            $errorArray['flag'] = '3';
            $errorArray['scene_id'] = 'normalPush';
            $errorArray['package'] = I('get');
            $errorArray['create_time'] = date('YmdHis');
            $wechatEventModel = D('WechatEvent');
            $wechatEventModel->add($errorArray);
        }

        // get message content
        $this->postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (empty($this->postStr)) {
            exit;
        }

        // 2014-11-11 增加微信消息加解密判断业务
//        $this->isEncrypt = isset($_GET['encrypt_type']) && $_GET['encrypt_type'] == 'aes' ? true : false;
//        if ($this->isEncrypt) {
//            // 解析消息(有加密)
//            $xml_tree = new \DOMDocument();
//            $xml_tree->loadXML($this->postStr);
//            $array_e = $xml_tree->getElementsByTagName('Encrypt');
//            $array_u = $xml_tree->getElementsByTagName('ToUserName');
//            $encrypt = $array_e->item(0)->nodeValue;
//            $userName = $array_u->item(0)->nodeValue;
//            $msg_signature = I('get.msg_signature');
//            $format = "<xml><ToUserName><![CDATA[%s]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
//            $from_xml = sprintf($format, $userName, $encrypt);
//            $this->postStr = $this->wxDecrypt(array(
//                'msg_sign' => $msg_signature,
//                'timestamp' => I('get.timestamp'),
//                'nonce' => I('get.nonce'),
//                'xml' => $from_xml,
//            ));
//        };
//        
        // 解析消息
        $this->postObj = simplexml_load_string($this->postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        $this->openID = (string) $this->postObj->FromUserName; // 发送方的openid
        $this->serviceID = (string) $this->postObj->ToUserName; // 服务号
        $this->msgType = strtolower((string) $this->postObj->MsgType); // 消息类型 text event
        $this->content = (string) trim($this->postObj->Content);
        $this->createTime = (int) $this->postObj->CreateTime;
        // 过滤垃圾微信的事件通知
//        $cacheFilter = F('WX_FILTER_' . date('Ymd'));
//        if ($cacheFilter === false) {
//            $cacheFilter = array();
//            $cacheFilter[$this->openID]['event'] = '';
//            $cacheFilter[$this->openID]['msg'] = '';
//            $cacheFilter[$this->openID]['time'] = $this->createTime;
//        } else {
//            if (array_key_exists($this->openID, $cacheFilter)) {
//                $lastCreateTime = (int) $cacheFilter[$this->openID]['time'];
//                $lastEvent = (string) $cacheFilter[$this->openID]['event'];
//                $lastMsg = (string) $cacheFilter[$this->openID]['msg'];
//                if ($this->msgType == 'event') {
//                    $this->eventKey = strtolower((string) trim($this->postObj->EventKey));
//                    if ($lastEvent == $this->eventKey && $lastCreateTime == $this->createTime) {
//                        // 微信连续push相同的事件，忽略
//                        echo '';
//                        exit;
//                    };
//                    $cacheFilter[$this->openID]['event'] = $this->eventKey;
//                    $cacheFilter[$this->openID]['msg'] = '';
//                    $cacheFilter[$this->openID]['time'] = $this->createTime;
//                } else {
//                    $this->msgID = strtolower((string) trim($this->postObj->MsgId));
//                    if ($lastMsg == $this->msgID && $lastCreateTime == $this->createTime) {
//                        // 微信连续push相同的msg，忽略
//                        echo '';
//                        exit;
//                    };
//                    $cacheFilter[$this->openID]['event'] = '';
//                    $cacheFilter[$this->openID]['msg'] = $this->msgID;
//                    $cacheFilter[$this->openID]['time'] = $this->createTime;
//                };
//            } else {
//                $cacheFilter[$this->openID]['msg'] = '';
//                $cacheFilter[$this->openID]['event'] = '';
//                $cacheFilter[$this->openID]['time'] = $this->createTime;
//            };
//        };
//        F('WX_FILTER_' . date('Ymd'), $cacheFilter);
        // 以下是业务处理
        switch ($this->msgType) {
            case 'event': // 接收 -> 事件推送
                $this->event = strtolower((string) trim($this->postObj->Event));
                switch ($this->event) {
                    case 'subscribe': // 关注动作
                        $this->subscribe();
                        break;
                    case 'unsubscribe': // 取消关注动作
                        $this->unsubscribe();
                        break;
                    case 'location': // 地理位置信息(用户自动上报，这里只有经纬度数据，没有地址文本)
                        $this->lng = round((float) $this->postObj->Longitude * 1000000, 0);
                        $this->lat = round((float) $this->postObj->Latitude * 1000000, 0);
                        $this->recordLocate('AUTO');
                        break;
                    case 'click': // 自定义菜单的点击事件
                    case 'view': // 自定义菜单的查看事件
                        $this->eventKey = (string) trim($this->postObj->EventKey); // 这个是自定义菜单中定义的
                        $this->click($this->eventKey);
                        break;
                    default:

                        break;
                };
            case 'text': // 接收 -> 文本消息
//                $this->receive('text');
                $match = preg_match_all("/^kf:([a-zA-Z0-9]{3,8})$/", $this->content, $matchs, PREG_SET_ORDER);
                if ($match > 0) {
                    $this->initChat($matchs[0][1]); // fk:A000001
                };
                break;
            case 'image': // 接收 -> 图片消息
                $this->picUrl = (string) $this->postObj->PicUrl;
                $this->mediaID = (string) $this->postObj->MediaId;
//                $this->receive('image');
                break;
            case 'voice': // 接收 -> 语音消息
                $this->recognition = (string) $this->postObj->Recognition;
                $this->format = (string) $this->postObj->Format;
                $this->mediaID = (string) $this->postObj->MediaId;
//                $this->receive('voice');
                break;
            case 'video': // 接收 -> 视频消息
                $this->thumbMediaID = (string) $this->postObj->ThumbMediaId;
                $this->mediaID = (string) $this->postObj->MediaId;
//                $this->receive('video');
                break;
            case 'link': // 接收 -> 链接消息
                $this->title = (string) $this->postObj->Title;
                $this->description = (string) $this->postObj->Description;
                $this->url = (string) $this->postObj->Url;
//                $this->receive('link');
                break;
            case 'location': // 地理位置消息(用户手工上报)
                $this->lng = round((float) $this->postObj->Location_Y * 1000000, 0);
                $this->lat = round((float) $this->postObj->Location_X * 1000000, 0);
                $this->label = (string) trim($this->postObj->Label); // 使用微信的地址文本替换高德文本
                $this->recordLocate();
//                $this->receive('location');
                break;
            default:
                //$this->response($this->lang['DEFAULT']); // 默认消息
                break;
        };
    }

    /**
     * 关注动作
     */
    private function subscribe() {
        if (trim($this->openID) == '') {
            return;
        }

        // 检查自动回复规则
        $wechatConfigModel = D('WechatConfig');
        $condition = array('identity_code' => C('wechat.token'));
        $wechatConfigArray = $wechatConfigModel->getOneMsgInfo($condition);
        if ($wechatConfigArray['subscribe_is_replay'] == '1') {
            switch ($wechatConfigArray['subscribe_replay_type']) {
                case '2':
                    $content = $rs['content'];
                    $find = array('{$toUser}', '{$fromUser}', '{$createTime}', '{$content}');
                    $repl = array($this->openID, $this->serviceID, $this->time, $content);
                    $responseXml = str_ireplace($find, $repl, $template['text']);
                    break;

                case '3':

                    break;

                case '4':

                    break;

                case '5':

                    break;

                case '6':

                    break;
            }
        }

        $this->_saveTrace('1');
        $this->_recordOpenUser();
    }

    /**
     * 取消关注
     */
    private function unsubscribe() {
        if (trim($this->openID) == '') {
            return;
        }
        $wechatUserModel = D('WechatUser');
        $condition = array('open_id' => $this->openID);
        $saveData = array('subscribe' => '0');
        $wechatUserModel->saveExistData($condition, $saveData);
        $this->_saveTrace('2');
    }
    
    /**
     * 给定 openid 获取指定关注者的信息
     * 每次用户触发交互时更新信息
     * @param boolean $force 是否强制更新粉丝信息
     */
    private function _recordOpenUser() {
        if (trim($this->openID) == '') {
            return;
        }
        $wechatUserModel = D('WechatUser');
        $condition = array('open_id' => $this->openID);
        $wechatUserInfo = $wechatUserModel->getOneMsgInfo($condition);
        $wechatApi = A('Api/Wechat');
        $user = $wechatApi->useUnionGetUserInfo($this->openID);
        if (!array_key_exists('openid', $user) || empty($user)) {
            return;
        }
        if ($wechatUserInfo == null) {
            // 记录新粉丝
            $sid = $wechatUserModel->add(array(
                'open_id' => $user['openid'],
                'subscribe' => $user['subscribe'],
                'subscribe_time' => $user['subscribe_time'],
                'nickname' => $user['nickname'],
                'sex' => $user['sex'],
                'language' => $user['language'],
                'city' => $user['city'],
                'province' => $user['province'],
                'country' => $user['country'],
                'headimgurl' => $user['headimgurl'],
                'last_time' => $this->date,
                'create_time' => $this->date,
                'source' => substr($this->eventKey, 0, strlen('qrscene_')) == 'qrscene_' ? substr($this->eventKey, strlen(qrscene) + 1) : 0,
            ));
        } else {
            $sid = $wechatUserInfo['id'];
            $wechatUserModel->save(array('subscribe'=>'1',
                'last_time' => $this->date, 
                'source' => substr($this->eventKey, 0, strlen('qrscene_')) == 'qrscene_' ? substr($this->eventKey, strlen(qrscene) + 1) : 0), array('where' => '`id`=' . $sid)); // 更新粉丝的最后交互时间
        };
    }

    /**
     * 记录日志
     */
    private function _saveTrace($flag) {
        $WechatEventModel = D('WechatEvent');
        $id = $WechatEventModel->add(array(
            'create_time' => $this->date,
            'flag' => $flag,
            'open_id' => $this->openID,
            'scene_id' => $this->eventKey,
            'package' => $this->postStr,
        ));
    }

}
