<?php
namespace Store\Controller;
use Think\Controller;

class BaseController extends Controller {

    function __construct() {
        parent::__construct();
        if($_SESSION['user'] == ''){
            redirect(U('Store/Index/login'));
        }
    }

}
