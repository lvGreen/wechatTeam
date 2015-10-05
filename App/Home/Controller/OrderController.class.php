<?php

namespace Home\Controller;

use Think\Controller;

class OrderController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    /**
     * 订单列表页
     */
    public function orderList() {
        $shopService = D('Shop', 'Service');
        $orderList = $shopService->getOrderList('all');
        $this->assign('orderList', $orderList);
        $this->display();
    }
    
    public function unpayedOrderList(){
        $shopService = D('Shop', 'Service');
        $orderList = $shopService->getOrderList('unpayed');
        $this->assign('orderList', $orderList);
        $this->display('orderList');
    }
    
    public function payedOrderList(){
        $shopService = D('Shop', 'Service');
        $orderList = $shopService->getOrderList('payed');
        $this->assign('orderList', $orderList);
        $this->display('orderList');
    }
    
    public function deliveryOrderList(){
        $shopService = D('Shop', 'Service');
        $orderList = $shopService->getOrderList('delivery');
        $this->assign('orderList', $orderList);
        $this->display('orderList');
    }
    
    public function completeOrderList(){
        $shopService = D('Shop', 'Service');
        $orderList = $shopService->getOrderList('complete');
        $this->assign('orderList', $orderList);
        $this->display('orderList');
    }
    
//    public function legalOrderList(){
//        $shopService = D('Shop', 'Service');
//        $orderList = $shopService->getOrderList('unpayed');
//        $this->assign('orderList', $orderList);
//        $this->display('orderList');
//    }

    /**
     * 订单详情页
     */
    public function orderDetail() {
        
    }

    /**
     * 下单页面
     */
    public function createOrder() {
        $type = I('get.type');
        $this->assign('type', $type);
        $addrId = I('get.addrId');
        $addrCondition = array();
        if ($addrId) {
            $addrCondition['id'] = $addrId;
        }
        $addrCondition['openid'] = $_SESSION['openid'];
        $addrCondition['status'] = '1';
        $addrInfo = M('UserAddr')
                ->field('receive_name, address, phone, id')
                ->where($addrCondition)
                ->order('last_use_time DESC, `id` DESC')
                ->find();
        if (empty($addrInfo)) {
            $this->assign('addrUrl', U('Home/PersonalAddr/addAddr', array('type' => $type)));
        } else {
            $this->assign('addrUrl', U('Home/PersonalAddr/index', array('type' => $type)));
        }
        $this->assign('addrInfo', $addrInfo);
        switch ($type) {
            case 'car':
                $shopService = D('Shop', 'Service');
                $goodsInfo = $shopService->getCashCarGoods();
                $this->assign('goodsInfo', $goodsInfo);
                break;
            case 'goods':
                $goodsCode = I('get.code');
                $goodsInfo = M('Goods')
                        ->field('small_img, title, price, purchase_price, discount_price, goods_code, unless_count, count as goodsCount')
                        ->where(array('goods_code'=>$goodsCode))
                        ->find();
                $goodsInfo['count'] = I('get.cn');
                $result[] = $goodsInfo;
                $this->assign('goodsInfo', $result);
                break;
            default :
        }
        $this->display();
    }

    /**
     * 添加订单入库
     */
    public function addOrder() {
        $result = array();
        $saveData = array();
        $addrId = (int) I('post.addr_id');
        if ($addrId == 0) {
            $result['error'] = '1001';
            $result['msg'] = '请选择有效的地址！';
            $this->ajaxReturn($result);
            exit;
        }
        $orderSNStr = time() . $addrId;
        $saveData['order_sn'] = md5($orderSNStr);
        $saveData['user_addr_id'] = $addrId;

        $orderType = I('post.orderType');
        switch ($orderType) {
            case 'car':
                $saveData['order_type'] = '0';
                $shopService = D('Shop', 'Service');
                $goodsInfo = $shopService->getCashCarGoods();
                $totalMoney = 0;
                foreach ($goodsInfo as $goods) {
                    $totalMoney += $goods['count'] * $goods['price'];
                }
                $saveData['price'] = $totalMoney;
                break;
                
            case 'goods':
                $saveData['order_type'] = '1';
                $goodsCode = I('post.goodsCode');
                $singleGoods = M('Goods')->where(array('goods_code'=>$goodsCode))->field('price, unless_count')->find();
                $count = (int) I('post.goodsCount');
                $saveData['price'] = $singleGoods['price'] * $count;
                break;
            default :
        }
        $saveData['explain'] = I('post.remark');
        $saveData['pay_type'] = I('post.paytype');
        $saveData['status'] = '0';
        $saveData['shop_code'] = $_SESSION['wapShop'];
        $saveData['add_time'] = date('YmdHis');
        $saveData['open_id'] = $_SESSION['openid'];
        M()->startTrans();
        $orderId = M('Order')->add($saveData);
        if ($orderId) {
            $orderGoodsArray = array();
            $orderGoodsArray['order_sn'] = $saveData['order_sn'];
            $orderGoodsModel = M('OrderGoods');
            $goodsModel = M('Goods');
            switch ($orderType) {
                case 'car':
                    $carStr = str_replace(';', ',', $_COOKIE['buyCar']);
                    foreach ($goodsInfo as $goods) {
                        $orderGoodsArray['goods_code'] = $goods['goods_code'];
                        $orderGoodsArray['count'] = $goods['count'];
                        $orderGoodsArray['price'] = $goods['price'];
                        $orderGoodsArray['add_time'] = date('YmdHis');
                        $orderGoodsId = $orderGoodsModel->add($orderGoodsArray);
                        if(!$orderGoodsId){
                            M()->rollback();
                            $result['error'] = '3001';
                            $result['msg'] = '无法生成商品详单！';
                            $this->ajaxReturn($result);
                            exit;
                        }else{
                            if($goods['unless_count'] == '0'){
                                $goodsModel
                                    ->where(array('goods_code'=>$goods['goods_code'], 'shop_code'=>$_SESSION['wapShop']))
                                    ->setDec('count', $goods['count']);
                            }
                            $goodsModel
                                ->where(array('goods_code'=>$goods['goods_code'], 'shop_code'=>$_SESSION['wapShop']))
                                ->setInc('sold_count', $goods['count']);
                        }
                    }
                    M('Car')->where(array('id'=>array('in', $carStr), 'open_id'=>$_SESSION['openid']))->save(array('status'=>'3'));
                    break;
                    
                case 'goods':
                    $orderGoodsArray['goods_code'] = $goodsCode;
                    $orderGoodsArray['count'] = I('post.goodsCount');
                    $orderGoodsArray['price'] = $singlePrice;
                    $orderGoodsArray['add_time'] = date('YmdHis');
                    $orderGoodsId = $orderGoodsModel->add($orderGoodsArray);
                    if(!$orderGoodsId){
                        M()->rollback();
                        $result['error'] = '3001';
                        $result['msg'] = '无法生成商品详单！';
                        $this->ajaxReturn($result);
                        exit;
                    }else{
                        if($singleGoods['unless_count'] == '0'){
                            $goodsModel
                                ->where(array('goods_code'=>$goods['goods_code'], 'shop_code'=>$_SESSION['wapShop']))
                                ->setDec('count', $count);
                        }
                        $goodsModel
                            ->where(array('goods_code'=>$goods['goods_code'], 'shop_code'=>$_SESSION['wapShop']))
                            ->setInc('sold_count', $count);
                    }
                    
                    break;
                default:
            }
            M('UserAddr')->where(array('id'=>$addrId, 'openid'=>$_SESSION['openid']))->save(array('last_use_time'=>date('YmdHis')));
            M()->commit();
            cookie('buyCar',' ', 1);
            $result['error'] = '0';
            $result['msg'] = '添加订单成功！';
            $result['url'] = '支付链接';
            $this->ajaxReturn($result);
            exit;
        } else {
            M()->rollback();
            $result['error'] = '2001';
            $result['msg'] = '无法生成订单！';
            $this->ajaxReturn($result);
            exit;
        }
    }

    /**
     * 添加进商品购物车
     */
    public function addGoodsCar() {
        $result = array();
        $saveData = array();
        $saveData['open_id'] = $_SESSION['openid'];
        $saveData['goods_code'] = I('post.id');
        if ($saveData['goods_code'] == '') {
            $result['error'] = '1001';
            $result['msg'] = '商品编码不能为空！';
            $this->ajaxReturn($result);
            exit;
        }
        $saveData['count'] = I('post.count');
        if ($saveData['count'] == '') {
            $result['error'] = '1002';
            $result['msg'] = '商品数量不能为空！';
            $this->ajaxReturn($result);
            exit;
        }

        $saveData['status'] = '1';
        $saveData['add_time'] = date('YmdHis');
        $saveId = M('Car')->add($saveData);
        if ($saveId) {
            $result['error'] = '0';
            $result['msg'] = '添加购物车成功！';
            $this->ajaxReturn($result);
            exit;
        } else {
            $result['error'] = '2001';
            $result['msg'] = '数据库写入失败！';
            $this->ajaxReturn($result);
            exit;
        }
    }

    /**
     * 购物车
     */
    public function buyCar() {
        $condition = array();
        $condition['sc.open_id'] = $_SESSION['openid'];
        $condition['sc.status'] = '1';
        $carList = M('Car sc')
                ->join('shop_goods sg ON sc.goods_code = sg.goods_code')
                ->field('sc.id, sc.count, sg.title, sg.price, sg.purchase_price, sg.discount_price, sg.small_img, sg.goods_code')
                ->where($condition)
                ->select();
        $this->assign('carList', $carList);
        $this->assign('buyCar', 'buyCar');
        $this->display();
    }

    /**
     * 创建购物车cookie
     */
    public function createCarCache() {
        $carId = I('post.id');
        $type = I('post.type');
        if ($type == 'car') {
            cookie('buyCar', $carId, 3600 * 3);
            $this->ajaxReturn(1);
        }
    }

}
