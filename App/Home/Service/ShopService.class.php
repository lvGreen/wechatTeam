<?php

namespace Home\Service;

use Think\Controller;

class ShopService extends Controller {

    private $classGoodsCount = 2;

    /**
     * 获取分类
     */
    public function getClass($type) {
        $result = array();
        if ($type == 'classAndGoods') {
            $classInfo = M('Class')
                    ->field('`id`, name, parent_id')
                    ->where(array('shop_code' => $_SESSION['wapShop'], 'type' => '1', 'is_delete' => '1'))
                    ->select();
            $goodsModel = M('Goods');
            foreach ($classInfo as $val) {
                if ($val['parent_id'] == '0') {
                    $result[$val['id']] = $val;
                } else {
                    $result[$val['parent_id']]['goods'] = $goodsModel
                            ->where(array('status' => '1', 'shop_code' => $_SESSION['wapShop']))
                            ->order('`index` desc')
                            ->limit($this->classGoodsCount)
                            ->select();
                }
            }
        }
        return $result;
    }

    /**
     * 获取购物车购买物品
     */
    public function getCashCarGoods() {
        $buyCarStr = str_replace(';', ',', $_COOKIE['buyCar']);
        $goodsCondition = array();
        $goodsCondition['sc.open_id'] = $_SESSION['openid'];
        $goodsCondition['sc.status'] = '1';
        $goodsCondition['sc.id'] = array('in', $buyCarStr);
        $goodsInfo = M('Car sc')
            ->join('shop_goods sg ON sg.goods_code = sc.goods_code')
            ->field('sc.count, sg.small_img, sg.title, sg.price, sg.purchase_price, sg.discount_price, sg.goods_code, sg.unless_count, sg.count as goodsCount')
            ->where($goodsCondition)
            ->select();
        return $goodsInfo;
    }
    
    /**
     * 获取订单列表
     */
    public function getOrderList($type){
        $result = array();
        $searchCondition = array();
        switch($type){
            case 'unpayed':
                $searchCondition['so.status'] = '0';
                break;
            case 'payed':
                $searchCondition['so.status'] = '1';
                break;
            case 'delivery':
                $searchCondition['so.status'] = '2';
                break;
            case 'complete':
                $searchCondition['so.status'] = '3';
                break;
            case 'all':
                break;
        }
        $searchCondition['so.shop_code'] = $_SESSION['wapShop'];
        $searchCondition['so.open_id'] = $_SESSION['openid'];
        $orderInfo = M('Order so')
            ->join('shop_order_goods sog ON sog.order_sn = so.order_sn')
            ->join('shop_goods sg ON sg.goods_code = sog.goods_code')
            ->field('so.order_sn, so.add_time, so.price, sog.price as sogprice, sog.count, sg.title, sg.price as sgprice, sg.small_img')
            ->where($searchCondition)
            ->select();
        if(empty($orderInfo)){
            $result = '1001';
        }else{
            foreach ($orderInfo as $val){
                $tmpGoods = array();
                $tmpGoods['sogprice'] = $val['sogprice'];
                $tmpGoods['count'] = $val['count'];
                $tmpGoods['title'] = $val['title'];
                $tmpGoods['small_img'] = $val['small_img'];

                $result[$val['order_sn']]['order_sn'] = $val['order_sn'];
                $result[$val['order_sn']]['add_time'] = $val['add_time'];
                $result[$val['order_sn']]['price'] = $val['price'];
                $result[$val['order_sn']]['goods'][] = $tmpGoods;
            }
        }
        return $result;
    }

}
