<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {

    function __construct() {
        parent::__construct();
        $_SESSION['wapShop'] = I('.shop');
        if($_SESSION['wapShop'] == ''){
            $this->error('您输入的URL地址有误，请核对后再输入！');
        }
    }

}