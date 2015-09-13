<?php
namespace Store\Controller;
use Think\Controller;

class ShopController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        print_r($_SESSION);
        exit;
        $this->display();
    }

}
