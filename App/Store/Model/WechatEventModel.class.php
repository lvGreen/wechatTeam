<?php
namespace Store\Model;
use Think\Model;

class WechatEventModel extends Model{
    function __construct() {
        parent::__construct();
    }

    function getOneMsgInfo($condition){
        $WechatEventModel = M('WechatEvent');
        $id = $WechatEventModel->add($data);
        return $id;
    }
}
