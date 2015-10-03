<?php
namespace Api\Controller;
use Think\Controller;

class BaseController extends Controller {

    function __construct() {
            C(load_config((APP_PATH.'Api2/Conf/config.php')));
    }
}