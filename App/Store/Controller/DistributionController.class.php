<?php
namespace Store\Controller;
use Think\Controller;

class DistributionController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 分销设置页面
     */
    public function distributionConfig(){
        $distributionInfo = M('DistributionConfig')->where(array('shop_code'=>$_SESSION['unique_code']))->find();
        $this->assign('distributionInfo', $distributionInfo);
        $this->display();
    }
    
    /**
     * 分销设置入库
     */
    public function addDistributionConfig(){
        $saveData = array();
        $configId = I('post.configId');
        $saveData['customer_point'] = I('post.pointnum_ag');
        $saveData['point'] = I('post.tjpointnum_ag');
        $saveData['two_point'] = I('post.tjpointnum_ag2');
        $saveData['three_point'] = I('post.tjpointnum_ag3');
        $saveData['concern_point'] = I('post.ticheng360_2');
        $saveData['discount'] = I('post.address2off');
        $saveData['discount_number'] = I('post.discountNumber');
        $saveData['concern_discount'] = I('post.guanzhuoff');
        $saveData['lower_commission_money'] = I('post.tixian');
        $saveData['commission'] = I('post.ticheng180_1');
        $saveData['two_commission'] = I('post.ticheng180_h1_1');
        $saveData['three_commission'] = I('post.ticheng180_h2_1');
        $saveData['lower_money'] = I('post.openfx_minmoney');
        $saveData['lower_man'] = I('post.lower_Man');
        $saveData['default_concern'] = I('post.openfxauto');
        if($saveData['default_concern'] != '1'){
            $saveData['default_concern'] = '0';
        }else{
            $saveData['lower_money'] = 0;
            $saveData['lower_man'] = 0;
        }
        $saveData['lower_money_two'] = I('post.openfx_minmoneyTwo');
        $saveData['lower_man_two'] = I('post.lower_ManTwo');
        $saveData['both_two'] = I('post.bothTwo');
        if($saveData['both_two'] != '1'){
            $saveData['both_two'] = '0';
        }
        $saveData['lower_money_three'] = I('post.openfx_minmoneyThree');
        $saveData['lower_man_three'] = I('post.lower_ManThree');
        $saveData['both_three'] = I('post.bothThree');
        if($saveData['both_three'] != '1'){
            $saveData['both_three'] = '0';
        }
        if($configId){
            M('DistributionConfig')->where(array('id'=>$configId, 'shop_code'=>$_SESSION['unique_code']))->save($saveData);
            $this->success('修改成功！');
        }else{
            $saveData['shop_code'] = $_SESSION['unique_code'];
            $saveData['add_time'] = date('YmdHis');
            $addId = M('DistributionConfig')->add($saveData);
            if($addId){
                $this->success('添加数据成功！');
            }else{
                $this->error('添加数据失败！');
            }
        }
    }
    
}
