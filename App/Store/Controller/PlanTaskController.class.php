<?php
namespace Store\Controller;
use Think\Controller;

class PlanTaskController extends Controller {
    function __construct() {
        parent::__construct();
        if(!$this->_checkPermission()){
            echo '没有权限！';
            exit;
        }
    }
    
    private function _checkPermission(){
        return TRUE;
    }
    
    /**
     * 股票当前是否低于预期值
     */
    public function grapMarketIndex(){
        $marketModel = A('Api/Market');
        $marketConfig = C('marketIndex');
        $marketName = $marketConfig['name'];
        
        $realTimeMarketData = $marketModel->grapMarket($marketName);
        if($realTimeMarketData[3] < $marketConfig['target']){
            $sendContent = '小于设置值'.$marketConfig['target'];
            $mailModel = A('Api/Mail');
            $result = $mailModel->sendmail('skyshappiness@gmail.com',$realTimeMarketData[0],$sendContent);
        }
    }
    
    public function grabAiqiyiAccount(){
        $result = array();
        $rule = '/tid=(.*)&amp/';
        $configUrlArray = C('aqiyiHtml');
        $i = count($configUrlArray);
        
        $url = $configUrlArray[0][0];
        $content = http_curl($url,'','get');
        $content = iconv('gbk', 'utf8', $content);
        preg_match($rule, $content, $machesResult);
        
        $aiqiyiAccountModel = M('AiqiyiAccount');
        $secondUrl = str_replace('{changeID}', array_pop($machesResult), $configUrlArray[0][1]);
        $isExist = $aiqiyiAccountModel->where(array('url'=>$secondUrl))->getfield('id');
        
        if($isExist){
            echo '页面 一 已抓取';
        }else{
            $accountContent = http_curl($secondUrl,'','get');
            $accountContent = iconv('gbk', 'utf8', $accountContent);
            $accountRule = '/<\/font>(.*)<\/td><\/tr><\/table>/iUs';
            preg_match_all($accountRule, $accountContent, $accountArray);
            foreach($accountArray[0] as $val){
                $str = strip_tags($val);
                $result['name_pass'] = str_replace('&nbsp;', '', $str);
                $result['add_time'] = date('YmdHis');
                $result['url'] = $secondUrl;
                $aiqiyiAccountModel->add($result);
            }
        }
        
        $url = $configUrlArray[1][0];
        $content = http_curl($url,'','get');
        $content = iconv('gbk', 'utf8', $content);
        $rule = '/index.php\?control=article\&id=(.*)">/';
        preg_match($rule, $content, $machesResult);
        
        $secondUrl = str_replace('{changeID}', array_pop($machesResult), $configUrlArray[1][1]);
        $isExist = $aiqiyiAccountModel->where(array('url'=>$secondUrl))->getfield('id');
        
        if($isExist){
            echo '页面 二 已抓取';
        }else{
            $accountContent = http_curl($secondUrl,'','get');
            $accountContent = iconv('gbk', 'utf8', $accountContent);
            $accountRule = '/账号(.*)<br>/iUs';
            preg_match_all($accountRule, $accountContent, $accountArray);
            foreach($accountArray[0] as $val){
                $str = strip_tags($val);
                $result['name_pass'] = str_replace('&nbsp;', '', $str);
                $result['add_time'] = date('YmdHis');
                $result['url'] = $secondUrl;
                $aiqiyiAccountModel->add($result);
            }
        }
        
    }
}