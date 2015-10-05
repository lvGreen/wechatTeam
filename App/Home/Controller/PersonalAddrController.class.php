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
        if(empty($userAddrList)){
            $userAddrList = '1001';
        }
        $this->assign('addrList', $userAddrList);
        $this->assign('addr', 'addr');
        $this->display();
    }
    
    /**
     * 地址添加修改页
     */
    public function addAddr(){
        $addrId = I('get.addrId');
        $type = I('get.type');
        $this->assign('type', $type);
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
        $addrId = I('post.id');
        $type = I('post.type');
        $result = array();
        $saveData = array();
        $saveData['receive_name'] = I('post.name');
        if($saveData['receive_name'] == ''){
            $result['error'] = '1001';
            $result['msg'] = '请详细填写收货人姓名！';
            $this->ajaxReturn($result);
            exit;
        }
        
        $saveData['phone'] = I('post.tel');
        $isPhone = check_str($saveData['phone'], array('strtype'=>'mobile'));
        if(is_array($isPhone)){
            $this->ajaxReturn($isPhone);
            exit;
        }
        
        $province = I('post.province');
        $city = I('post.city');
        $area = I('post.area');
        $address = I('post.address');
        if($province == '' || $area == '' || $address == ''){
            $result['error'] = '3001';
            $result['msg'] = '请详细填写收货地址！';
            $this->ajaxReturn($result);
            exit;
        }
        $saveData['privince'] = $province;
        $saveData['city'] = $city;
        $saveData['town'] = $area;
        $saveData['address'] = $address;
        
        $userAddrModel = M('UserAddr');
        if($addrId){
            $userAddrModel->where(array('openid'=>$_SESSION['openid'], 'id'=>$addrId))->save($saveData);
        }else{
            $saveData['openid'] = $_SESSION['openid'];
            $saveData['last_use_time'] = '0';
            $saveData['status'] = '1';
            $saveData['add_time'] = date('YmdHis');
            $addrId = $userAddrModel->add($saveData);
        }
        $result['error'] = '0';
        switch($type){
            case 'car':
                $result['url'] = U('Home/Order/createOrder',array('type'=>$type, 'addrId'=>$addrId));
                break;
            default:
                $result['url'] = U('Home/PersonalAddr/index');
        }
        $this->ajaxReturn($result);
        exit;
    }
}