<?php
namespace Home\Controller;
use Think\Controller;

class PersonalCenterController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        print_r($_SESSION);
        $this->display();
    }
    
    public function rankingList(){
        $ownInfo = M('WechatUser')->where(array('open_id'=>$_SESSION['openid']))->find();
        $this->assign('ownInfo', $ownInfo);
        $rankList = M('WechatUser')->where(array('shop_code'=>$_SESSION['wapShop']))->select();
        $this->assign('rankList', $rankList);
    }
}