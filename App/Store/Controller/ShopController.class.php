<?php
namespace Store\Controller;
use Think\Controller;

class ShopController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 登录首页
     */
    public function index(){
        $goodsModel = M('Goods');
        $goodsCount = $goodsModel->where(array('shop_code'=>$_SESSION['unique_code']))->count();
        $recommendGoodsCount = $goodsModel->where(array('shop_code'=>$_SESSION['unique_code'],'is_recommend'=>'1'))->count();
        $onlineGoodsCount = $goodsModel->where(array('shop_code'=>$_SESSION['unique_code'],'status'=>'1'))->count();
        $offlineGoodsCount = $goodsCount - $onlineGoodsCount;
        
        $orderModel = M('order');
        $orderCount = $orderModel->where(array('shop_code'=>$_SESSION['unique_code']))->count();
        $successOrderCount = $orderModel->where(array('shop_code'=>$_SESSION['unique_code'], 'status'=>'3'))->count();
        if(strpos($_SERVER['HTTP_USER_AGENT'],'Mac')){
            $oprationSystem = 'Mac';
        }else{
            $oprationSystem = 'Windows';
        }
        
        if(strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')){
            $browser = 'Chrome';
        }else{
            $browser = 'IE';
        }
        
        $this->assign('goodsCount', $goodsCount);
        $this->assign('recommendGoodsCount', $recommendGoodsCount);
        $this->assign('onlineGoodsCount', $onlineGoodsCount);
        $this->assign('offlineGoodsCount', $offlineGoodsCount);
        $this->assign('orderCount', $orderCount);
        $this->assign('successOrderCount', $successOrderCount);
        $this->assign('oprationSystem', $oprationSystem);
        $this->assign('browser', $browser);
        
        $this->display();
    }
    
    /**
     * 信息设置页面
     */
    public function viewCompanyConf(){
        print_r($_SESSION);
        $companyModel = M('Company');
        $companyInfo = $companyModel->where(array('user_id'=>$_SESSION['userId']))->find();
        if($companyInfo){
            $this->assign('edit','edit');
        }
        $this->assign('companyInfo', $companyInfo);
    }
    
    /**
     * 信息入库
     */
    public function setCompanyConf(){
        
    }

    /**
     * 分销设置
     */
    public function viewDistributionConf(){
        
    }
    
    /**
     * 分销设置入库
     */
    public function setDistributionConf(){
        
    }
}
