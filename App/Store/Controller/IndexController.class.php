<?php

namespace Store\Controller;

use Think\Controller;

class IndexController extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function login() {
        session_unset();
        $this->display();
    }
    
    public function createVerify(){
        $verifyConfig = C('verify');
        $Verify = new \Think\Verify($verifyConfig);
        $Verify->entry();
    } 

    public function userLogin() {
        $result = array();
        $verify = new \Think\Verify();
        $resultVerify = $verify->check($_POST['vifcode']);
        if($resultVerify == FALSE){
            $result['error'] = '1001';
            $result['msg'] = '验证码错误';
            $this->ajaxReturn($result);
            exit;
        }
        $userName = trim(I('post.adminname', '0', 'string'));
        $userModel = D('User');
        $userInfo = $userModel->getAccountInfo($userName);
        if (empty($userInfo)) {
            $this->error('账号或密码错误，请重新输入！');
        }
        $passArray['pass'] = I('post.password');
        $passArray['salt'] = $userInfo['salt'];
        $passArray['default'] = C('commonPassWord');
        $blogService = D('Check', 'Service');
        $pass = $blogService->createPass($passArray);
        if ($pass == $userInfo['password']) {
            $shopLogo = M('Company')->where(array('user_id'=>$userInfo['id']))->getfield('logo');
            $_SESSION['user'] = $userInfo['user'];
            $_SESSION['role'] = $userInfo['role'];
            $_SESSION['userId'] = $userInfo['id'];
            $_SESSION['unique_code'] = $userInfo['unique_code'];
            $_SESSION['logo'] = getUploadUrl($shopLogo);
            $_SESSION['expire'] = time()+1800;
            $result['error'] = '0';
            $result['url'] = U('Store/Shop/index');
        } else {
            $result['error'] = '1002';
            $result['msg'] = '账号或密码错误，请重新输入！';
        }
        $this->ajaxReturn($result);
    }
    
    public function logout(){
        session(NULL);
        redirect(U('Store/Index/login'));
    }

//    public function createAccount() {
//        $passWord = '123456';
//        $salt = time();
//        $passArray['pass'] = $passWord;
//        $passArray['salt'] = $salt;
//        $passArray['default'] = C('commonPassWord');
//        ksort($passArray);
//        $str = '';
//        foreach ($passArray as $key => $val) {
//            $str .= $key . '=' . $val . '&';
//        }
//        $pass = sha1($str);
//
//        $saveData['user'] = 'admin';
//        $saveData['password'] = $pass;
//        $saveData['salt'] = $salt;
//        $saveData['role'] = '1';
//        $saveData['unique_code'] = md5($pass);
//        $saveData['add_time'] = date('YmdHis');
//        $ID = M('User')->add($saveData);
//    }

}
