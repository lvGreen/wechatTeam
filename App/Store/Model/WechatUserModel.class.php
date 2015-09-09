<?php
namespace Store\Model;
use Think\Model;

class WechatUserModel extends Model{
    function __construct() {
        parent::__construct();
    }

    function getOneMsgInfo($condition){
        $wechatUserModel = M('WechatUser');
        $wechatUserInfo = $wechatUserModel->where($condition)->find();
        return $wechatUserInfo;
    }
    
    function saveExistData($condition, $saveData){
        $wechatUserModel = M('WechatUser');
        $wechatUserModel->where($condition)->save($saveData);
    }
}
