<?php
namespace Home\Controller;
use Think\Controller;

class GoodsController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 商品列表
     */
    public function goodsList(){
        $type = I('get.type');
        switch ($type){
            case 'class':
                $classId = I('get.classId');
                $classCondition = array();
                $classCondition['shop_code'] = $_SESSION['wapShop'];
                $classCondition['is_delete'] = '1';
                $classCondition['parent_id'] = $classId;
                $classArray = M('Class')->where($classCondition)->field('`id`, parent_id')->order('parent_id ASC')->select();
                $str = '0';
                foreach($classArray as $val){
                    $str .= ','.$val['id'];
                }
                
                $goodsCondition = array();
                $goodsCondition['shop_code'] = $_SESSION['wapShop'];
                $goodsCondition['class_id'] = array('in', $str);
                $goodsCondition['status'] = '1';
                
                $goodsArray = M('Goods')->where($goodsCondition)->field('goods_code, title, price, img, small_img')->select();
                $this->assign('goodsInfo', $goodsArray);
               break;
        }
        $this->display();
    }
    
    /**
     * 商品详情页
     */
    public function goodsDetail(){
        $goodsCode = I('get.code');
        $goodsCondition = array();
        $goodsCondition['goods_code'] = $goodsCode;
        $goodsCondition['status'] = '1';
        $goodsInfo = M('Goods')->where($goodsCondition)->find();
        $this->assign('goodsInfo', $goodsInfo);
        $soldCountCondition = array();
        $soldCountCondition['goods_code'] = $goodsCode;
        $soldCountCondition['status'] = '3';
        $soldCount = M('Order')->where($soldCountCondition)->count();
        $this->assign('soldCount', $soldCount);
        print_r($goodsInfo);
        print_r($soldCount);
        
        $this->assign('goods','goods');
        $this->display();
    }

}