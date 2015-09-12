<?php
/**
 * Created by PhpStorm.
 * User: Mac
 * Date: 9/12/15
 * Time: 7:32 PM
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function hello(){
        echo 'hello,thinkphp!';
    }
}