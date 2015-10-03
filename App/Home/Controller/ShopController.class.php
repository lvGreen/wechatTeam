<?php
namespace Home\Controller;
use Think\Controller;

class ShopController extends BaseController {
    private $bannerListCount = 5;

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 店铺首页
     */
    public function index(){
        $themeId = M('User')->where(array('unique_code'=>$_SESSION['wapShop']))->getfield('theme');
        $bannerArray = M('Banner')->where(array('shop_code'=>$_SESSION['wapShop'], 'status'=>'1'))->select();
        $this->assign('banner', $bannerArray);
        switch($themeId){
            case '1':
                $bannerList = M('Banner')
                    ->field('banner_img')
                    ->where(array('shop_code'=>$_SESSION['wapShop'], 'status'=>'1'))
                    ->order('`index` DESC')
                    ->limit($this->bannerListCount)
                    ->select();
                $this->assign('bannerList', $bannerList);
                
                $shopService = D('Shop', 'Service');
                $classInfo = $shopService->getClass('classAndGoods');
                $this->assign('classInfo' , $classInfo);
                print_r($_SESSION);
                print_r($classInfo);
                $this->display('themeOne');
                break;
            case '2':
                $this->display('themeTwo');
                break;
            case '3':
                $this->display('themeThree');
                break;
            default :
                $this->error('敬请期待！');
                exit;
        }
    }
    
    /**
     * 关于页面
     */
    public function about(){
        
    }

    /**
     * 通知，新闻页
     */
    public function question(){
        
    }
}