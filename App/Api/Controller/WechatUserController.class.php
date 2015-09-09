<?php

namespace Api\Controller;

use Think\Controller;

class WechatController extends WechatBaseController {
    public $appid;
    public $appsecrect;
    
    function __construct() {
        parent::__construct();
        $this->appid = C('wechat.appid');
        $this->appsecrect = C('wechat.appsecret');
    }
    
    public function getAccessToken(){
        $accessToken = S('token');
        if($accessToken == ''){
            $url = 'https://api.weixin.qq.com/cgi-bin/token?';
            $data = array(
                'grant_type'        =>  'client_credential',
                'appid'             =>  $this->appid,
                'secret'            =>  $this->appsecrect,
            );
            $content = http_curl($url,$data,'get');
            $accessToken = json_decode($content,TRUE);
            S('token',$accessToken,5400);
        }
        return $accessToken['access_token'];
    }
    
    public function getWechatIP(){
        $url = 'https://api.weixin.qq.com/cgi-bin/getcallbackip';
        $accessToken = $this->getAccessToken();
        $data = array(
            'access_token'      =>      $accessToken,
        );
        
        $content = http_curl($url,$data,'get');
        $wechatIP = json_decode($content,TRUE);
        return $wechatIP;
    }
    
    /**
     * 用户管理类接口
     * 
     */
    public function useUnionGetUserInfo($openID){
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info';
        $data = array(
            'access_token'      =>      $this->getAccessToken(),
            'openid'            =>      $openID,
            'lang'              =>      'zh_CN'
        );
        
        $content = http_curl($url,$data,'get');
        $resultArray = json_decode($content,TRUE);
        return $resultArray;
    }
    
    public function muchUserInfo($data){
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token='.$this->getAccessToken;
        foreach($data as $key=>$val){
            $data[$key]['lang'] = 'zh-CN';
        }
        $data = json_encode($data);
        $content = http_curl($url,$data,'post');
        $resultArray = json_decode($content,TRUE);
    }
    
    /**
     * 
     * @param type $jumpUrl
     * @param type $type        默认 ‘snsapi_base’ 方式获取用户信息
     */
    public function webAuthorization($jumpUrl,$type='snsapi_base'){
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize';
        $data = array(
            'appid'         =>      $this->appid,
            'redirect_uri'  =>      urlencode($jumpUrl),
            'response_type' =>      'code',
            'scope'         =>      $type,
            'state'         =>      'STATE#wechat_redirect'
        );
        
        http_curl($url,$data,'get');
    }
    
    /**
     * 
     * @param string $code
     * @param string $openID
     */
    public function userInfoToken($code){
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token';
        $data = array(
            'appid'         =>      $this->appid,
            'secret'        =>      $this->appsecrect,
            'code'          =>      $code,
            'grant_type'    =>      'authorization_code'
        );
        
        $content = http_curl($url,$data,'get');
        $resultArray = json_decode($content,TRUE);
        $openID = $this->_getUserInfo($resultArray['openid'], $resultArray['access_token']);
        return $openID;
    }
    
    private function _getUserInfo($openID,$token){
        $url = 'https://api.weixin.qq.com/sns/userinfo';
        $data = array(
            'access_token'      =>      $token,
            'openid'            =>      $openID,
            'lang'              =>      'zh_CN'
        );
        
        $content = http_curl($url,$data,'get');
        $userInfoArray = json_decode($content);
        return $userInfoArray['openid'];
    }
    
    public function getAttentionUser($openID=''){
        $url = 'https://api.weixin.qq.com/cgi-bin/user/get';
        $data = array(
            'access_token'      =>      $this->getAccessToken(),
            'next_openid'       =>      $openID
        );
        $content = http_curl($url,$data,'get');
        $openIDArray = json_decode($content);
        return $openIDArray;
    }
    
    private function _addDataToWechatUser($data){
        $wechatUserModel = D('WechatUser');
    }
    
    public function createUserGroup($data){
        $url = 'https://api.weixin.qq.com/cgi-bin/groups/create?access_token='.$this->getAccessToken();
        $data = json_encode($data);
        $content = http_curl($url,$data,'post');
        $groupArray = json_decode($content);
        return $groupArray;
    }
    
    public function searchGroup() {
        $url = 'https://api.weixin.qq.com/cgi-bin/groups/get';
        $data   =   array(
            'access_token'          =>      $this->getAccessToken()
        );
        $content = http_curl($url,$data,'get');
        $groupArray = json_decode($content);
        return $groupArray;
    }
    
    public function searchUserInWhichGroup($data){
        $url = 'https://api.weixin.qq.com/cgi-bin/groups/getid?access_token='.$this->getAccessToken();
        $data = json_encode($data);
        $content = http_curl($url,$data,'get');
        $userGroupArray = json_decode($content);
        return $userGroupArray;
    }
    
    public function editGroupName($data){
        $url = 'https://api.weixin.qq.com/cgi-bin/groups/update?access_token='.$this->getAccessToken();
        $data = json_encode($data);
        $content = http_curl($url,$data,'post');
        $userGroupArray = json_decode($content);
        return $userGroupArray;
    }
    
    public function moveUserToNewGroup($data){
        $url = 'https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token='.$this->getAccessToken();
        $data = json_encode($data);
        $content = http_curl($url,$data,'post');
        $userMoveArray = json_decode($content);
        return $userMoveArray;
    }
    
    public function multiMoveGroup($data){
        $url = 'https://api.weixin.qq.com/cgi-bin/groups/members/batchupdate?access_token='.$this->getAccessToken();
        $data = json_decode($data);
        $content = http_curl($url,$data,'post');
        $userMoveArray = json_decode($content);
        return $userMoveArray;
    }
    
    public function deleteGroup($data){
        $url = 'https://api.weixin.qq.com/cgi-bin/groups/delete?access_token='.$this->getAccessToken();
        $data = json_encode($data);
        $content = http_curl($url,$data,'post');
        $groupDelArray = json_decode($content);
        return $groupDelArray;
    }
    
    /**
     * 消息类接口
     */
    
}
