<?php
namespace Store\Controller;
use Think\Controller;

class GoodsController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 商品添加页面
     */
    public function goodsAdd(){
        
    }
    
    /**
     * 商品入库
     */
    public function addGoods(){
        
    }
    
    /**
     * 商品列表
     */
    public function goodsList(){
        print_r($_SESSION);
    }

}
