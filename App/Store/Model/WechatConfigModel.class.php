<?php
namespace Store\Model;
use Think\Model;

class WechatConfigModel extends Model{
    function __construct() {
        parent::__construct();
    }

    function getOneMsgInfo($condition){
        $wechatConfigModel = M('WechatConfig');
        $wechatConfigArray = $wechatConfigModel->where($condition)->find();
        return $wechatConfigArray;
    }
    
}
