<?php
namespace Home\Service;
use Think\Controller;

class AddrService extends Controller {
    
    /**
     * 
     * 获取微信用户地址
     */
    public function getUserAddrList(){
        $userAddrModel = M('UserAddr');
        $userAddrList = $userAddrModel->where(array('openid'=>$_SESSION['openid'], 'status'=>'1'))->order('`id` DESC')->select();
        return $userAddrList;
    }
    
    /**
     * 获取一条地址详细信息
     */
    
    public function getOneAddrDetail($condition){
        $userAddrModel = M('UserAddr');
        $addrDetail = $userAddrModel->where($condition)->find();
        return $addrDetail;
    }
        
}