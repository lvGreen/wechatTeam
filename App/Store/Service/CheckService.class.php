<?php
namespace Store\Service;
use Think\Controller;

class CheckService extends Controller {
    
    public function createPass($passArray){
        ksort($passArray);
        $str = '';
        foreach($passArray as $key => $val){
            $str .= $key.'='.$val.'&';
        }
        $pass = sha1($str);
        return $pass;
    }


    public function index(){
        
    }
}