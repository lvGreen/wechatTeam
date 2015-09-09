<?php
namespace Api\Controller;
use Think\Controller;

class BaseController extends Controller {

    function __construct() {
        parent::__construct();
        if(empty(C('mail'))){
            C(load_config((APP_PATH.'Api/Conf/config.php')));
        }
    }
}
