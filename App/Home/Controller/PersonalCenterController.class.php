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
}