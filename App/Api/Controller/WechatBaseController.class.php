<?php

namespace Api\Controller;

use Think\Controller;

class WechatBaseController extends BaseController {
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
}
