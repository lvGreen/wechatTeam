<?php

namespace Store\Controller;

use Think\Controller;

class OrderController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    /**
     * 订单列表页
     */
    public function orderList() {
        $condition = array();
        $condition['so.shop_code'] = $_SESSION['unique_code'];

        $startTime = I('post.EntTime1');
        $endTime = I('post.EntTime2');
        if ($startTime != '' && $endTime != '') {
            $startTime = str_replace('-', '', $startTime) . '000000';
            $endTime = str_replace('-', '', $endTime) . '235959';
            $condition['so.add_time'] = array(array('gt', $startTime), array('lt', $endTime));
        }

        $orderSn = I('post.order_sn');
        if ($orderSn != '') {
            $condition['so.order_sn'] = $orderSn;
        }

        $receiveName = I('post.consignee');
        if ($receiveName != '') {
            $condition['sua.receive_name'] = $receiveName;
        }

        $satus = I('post.status');
        if ($satus != '-1' && $satus != '') {
            $condition['so.status'] = $satus;
        }

        $orderList = M('Order so')
                ->join('shop_user_addr sua ON sua.id = so.user_addr_id')
                ->field('so.order_sn, so.price, so.status, so.add_time, sua.receive_name')
                ->where($condition)
                ->select();

        $this->assign('orderList', $orderList);
        $this->display();
    }

    /**
     * 订单详情
     * 
     */
    public function orderDetail() {
        $orderSn = I('get.order');
        $orderCondition = array();
        $orderCondition['so.order_sn'] = $orderSn;
        $orderCondition['so.shop_code'] = $_SESSION['unique_code'];
        $orderDetail = M('Order so')
                ->join('shop_user_addr sua ON sua.id = so.user_addr_id')
                ->join('shop_order_goods sog ON sog.order_sn = so.order_sn')
                ->join('shop_goods sg ON sg.goods_code = sog.goods_code')
                ->join('shop_wechat_user swu ON swu.open_id = so.open_id')
                ->field('so.order_sn, so.price as totalPrice, so.explain, so.status, so.add_time, so.pay_type, so.shipping_order, so.shipping_company, swu.nickname as orderName, sua.receive_name, sua.privince, sua.city, sua.town, sua.address, sua.phone, sg.title, sg.bar_code, sog.price as singlePrice, sog.count')
                ->where($orderCondition)
                ->select();
        $result = array();
        foreach ($orderDetail as $val) {
            $tempArray = array();
            $tempArray['title'] = $val['title'];
            $tempArray['bar_code'] = $val['bar_code'];
            $tempArray['singleprice'] = $val['singleprice'];
            $tempArray['count'] = $val['count'];
            $tempArray['total'] = $val['count'] * $val['singleprice'];
            $result['goods'][] = $tempArray;
            $result['order_sn'] = $val['order_sn'];
            $result['totalprice'] = $val['totalprice'];
            $result['explain'] = $val['explain'];
            $result['status'] = $val['status'];
            $result['add_time'] = $val['add_time'];
            $result['pay_type'] = $val['pay_type'];
            $result['shipping_order'] = $val['shipping_order'];
            $result['shipping_company'] = $val['shipping_company'];
            $result['ordername'] = $val['ordername'];
            $result['receive_name'] = $val['receive_name'];
            $result['privince'] = $val['privince'];
            $result['city'] = $val['city'];
            $result['town'] = $val['town'];
            $result['address'] = $val['address'];
            $result['phone'] = $val['phone'];
        }
        $this->assign('orderDetail', $result);
        $this->display();
    }

    /**
     * 添加或者修改物流信息
     */
    public function addShippingInfo() {
        print_r($_POST);
        $result = array();
        $orderSn = I('post.orderSn');
        $shippingCompany = I('post.shippingCompany');
        $shippingOrder = I('post.shippingOrder');
        if ($orderSn == '') {
            $result['error'] = '1001';
            $result['msg'] = '订单号不能为空！';
            $this->ajaxReturn($result);
            exit;
        }
        if ($shippingCompany == '' || $shippingOrder == '') {
            $result['error'] = '1002';
            $result['msg'] = '物流公司或者物流单号不能为空！';
            $this->ajaxReturn($result);
            exit;
        }

        M('Order')->where(array('shop_code' => $_SESSION['unique_code'], 'order_sn' => $orderSn))->save(array('shipping_order' => $shippingOrder, 'shipping_company' => $shippingCompany));

        $result['error'] = '0';
        $result['msg'] = '操作成功！';
        $this->ajaxReturn($result);
    }

    /**
     * 修改订单状态
     */
    public function changeOrderStatus() {
        $act = I('post.act');
        $orderSn = I('post.orderSn');
        if ($orderSn == '') {
            $result['error'] = '1001';
            $result['msg'] = '订单号不能为空！';
            $this->ajaxReturn($result);
            exit;
        }
        if ($act == '') {
            $result['error'] = '1002';
            $result['msg'] = '请下达指令！';
            $this->ajaxReturn($result);
            exit;
        }
        $beforeOpenid = M('Order')->where(array('shop_code' => $_SESSION['unique_code'], 'order_sn' => $orderSn))->getfield('open_id');
        $openid = M('WechatUser')->where(array('open_id' => $beforeOpenid))->getfield('commission_open_id');
        if ($openid != '') {
            $saveData['open_id'] = $openid;
            $saveData['order_sn'] = $orderSn;
            $saveData['add_time'] = date('YmdHis');
        }
        switch ($act) {
            case 'order':
                M('Order')->where(array('shop_code' => $_SESSION['unique_code'], 'order_sn' => $orderSn))->save(array('status' => '4'));

                if ($openid != '') {
                    //修改提成
                    $isCommiss = M('CommisionAction')->where(array('open_id' => $openid, 'action' => '2', 'order_sn' => $orderSn))->getfield('id');
                    if ($isCommiss == '') {
                        $commission = M('CommisionAction')->where(array('open_id' => $openid, 'action' => '1', 'order_sn' => $orderSn))->getfield('point');
                        $newCommission = -$commission;
                        $saveData['point'] = $newCommission;
                        $saveData['action'] = '2';
                        M('CommisionAction')->add($saveData);

                        $commissionNow = M('WechatUser')->where(array('open_id' => $openid))->getfield('commision_money');
                        $resultCommission = $commissionNow - $commission;
                        M('WechatUser')->where(array('open_id' => $openid))->save(array('commision_money' => $resultCommission));
                    }
                }
                break;
            case 'money':
                M('Order')->where(array('shop_code' => $_SESSION['unique_code'], 'order_sn' => $orderSn))->save(array('status' => '6'));
                if ($openid != '') {
                    //提成修改
                    $isCommiss = M('CommisionAction')->where(array('open_id' => $openid, 'action' => '3', 'order_sn' => $orderSn))->getfield('id');
                    if ($isCommiss == '') {
                        $commission = M('CommisionAction')->where(array('open_id' => $openid, 'action' => '1', 'order_sn' => $orderSn))->getfield('point');
                        $newCommission = -$commission;
                        $saveData['point'] = $newCommission;
                        $saveData['action'] = '3';
                        M('CommisionAction')->add($saveData);

                        $commissionNow = M('WechatUser')->where(array('open_id' => $openid))->getfield('commision_money');
                        $resultCommission = $commissionNow - $commission;
                        M('WechatUser')->where(array('open_id' => $openid))->save(array('commision_money' => $resultCommission));
                    }
                }
                break;
        }
    }

}
