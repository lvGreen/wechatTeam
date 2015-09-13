<?php
namespace Store\Model;
use Think\Model;

class UserModel extends Model {
    
    public function getAccountInfo($userName){
        $userInfo = $this->where(array('user'=>$userName))->find();
        return $userInfo;
    }
}