<?php
namespace Home\Service;
use Think\Controller;

class ShopService extends Controller {
    private $classGoodsCount = 2;
    
    /**
     * 获取分类
     */
    public function getClass($type){
        $result = array();
        if($type == 'classAndGoods'){
            $classInfo = M('Class')
                ->field('`id`, name, parent_id')
                ->where(array('shop_code'=>$_SESSION['wapShop'], 'type'=>'1', 'is_delete'=>'1'))
                ->select();
            $goodsModel = M('Goods');
            foreach($classInfo as $val){
                if($val['parent_id'] == '0'){
                    $result[$val['id']] = $val;
                }else{
                   $result[$val['parent_id']]['goods'] = $goodsModel
                           ->where(array('status'=>'1', 'shop_code'=>$_SESSION['wapShop']))
                           ->order('`index` desc')
                           ->limit($this->classGoodsCount)
                           ->select();
                    
                }
            }
        }
        return $result;
    }
}