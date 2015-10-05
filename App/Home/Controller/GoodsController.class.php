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
        $classId = I('get.classId');
        $goodsCondition = array();
        switch ($type){
            case 'class':
                $classCondition = array();
                $classCondition['shop_code'] = $_SESSION['wapShop'];
                $classCondition['is_delete'] = '1';
                $classCondition['parent_id'] = $classId;
                $classArray = M('Class')->where($classCondition)->field('`id`, parent_id')->order('parent_id ASC')->select();
                $str = '0';
                foreach($classArray as $val){
                    $str .= ','.$val['id'];
                }
                $goodsCondition['class_id'] = array('in', $str);
               break;
            case 'lastClass':
                $goodsCondition['class_id'] = $classId;
                break;
        }
        
        $goodsCondition['shop_code'] = $_SESSION['wapShop'];
        $goodsCondition['status'] = '1';

        $goodsArray = M('Goods')->where($goodsCondition)->field('goods_code, title, price, img, small_img')->select();
        $this->assign('goodsInfo', $goodsArray);
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
        
        $carCondition = array();
        $carCondition['open_id'] = $_SESSION['openid'];
        $carCondition['status'] = '1';
        $carCount = M('Car')->where($carCondition)->count();
        $this->assign('carCount', $carCount);
        
        $this->assign('goods','goods');
        $this->display();
    }
    
    /**
     * 分类列表
     */
    public function goodsClass(){
        $classCondition = array();
        $classCondition['shop_code'] = $_SESSION['wapShop'];
        $classCondition['type'] = '1';
        $classCondition['is_delete'] = '1';
        
        $classInfo = M('Class')->where($classCondition)->field('name, id, parent_id')->select();
        foreach ($classInfo as $val){
            if($val['parent_id'] == '0'){
                $result[$val['id']] = $val;
            }else{
                $result[$val['parent_id']]['next'][] = $val;
            }
        }
        
        $this->assign('classList', $result);
        $this->display();
    }
}