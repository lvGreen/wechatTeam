<?php
/**
 * Created by PhpStorm.
 * User: Mac
 * Date: 9/12/15
 * Time: 8:14 PM
 */

namespace Api\Controller;
use Think\Controller;
use Org\WeChat\WeChat;

class BasicController extends WeChat{
    private $appid = 'wxc87ca4da3a5e5a03';
    private $appsecret = '01ab48566a1a7f821084172bc0000b9e';

    public function __construct(){
        $option = array('token' => '77450309f8c9b7630c64a1735ddee138', 'appid' => $this->appid, 'appsecret' => $this->appsecret);
        parent::__construct($option);
        parent::valid();
    }
}