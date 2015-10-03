<?php
namespace Home\Controller;
use Think\Controller;

class PersonalAddrController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 地址列表页
     */
    public function index(){
        $addrService = D('Addr', 'Service');
        $userAddrList = $addrService->getUserAddrList();
        $this->assign('addrList', $userAddrList);
        $this->display();
    }
    
    /**
     * 地址添加修改页
     */
    public function addAddr(){
        $addrId = I('get.addrId');
        if($addrId){
            $addrService = D('Addr', 'Service');
            $condition = array();
            $condition['openid'] = $_SESSION['openid'];
            $condition['id'] = $addrId;
            $addrDetail = $addrService->getOneAddrDetail($condition);
            $this->assign('addrDetail', $addrDetail);
        }
        $this->display();
    }
    
    /**
     * 地址信息入库
     */
    public function addrAdd(){
        $saveData = array();
    }
}