<?php
namespace Store\Model;
use Think\Model;

class GoodsModel extends Model {
    
    public function getGoodsList($condition, $fields){
        $goodsList = M('Goods gs')
                ->field($fields)
                ->join('shop_class cs ON cs.id = gs.class_id')
                ->where($condition)
                ->select();
        return $goodsList;
    }
    
    public function getGoodsDetail($condition){
        $goodsInfo = $this->where($condition)->find();
        return $goodsInfo;
    }
}