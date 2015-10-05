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
        $introduction = M('User su')
            ->join('shop_company sc ON sc.user_id = su.id')
            ->where(array('su.unique_code'=>$_SESSION['wapShop']))
            ->field('sc.introduction')
            ->find();
        $this->assign('introduction', $introduction['introduction']);
        $this->display();
    }

    /**
     * 通知，新闻页
     */
    public function question(){
        $newsCondition = array();
        $newsCondition['status'] = '1';
        $newsCondition['shop_code'] = $_SESSION['wapShop'];
        
        $newsList = M('News')
                ->field('title, content')
                ->where($newsCondition)
                ->order('`index` DESC')
                ->select();
        $this->assign('newsList', $newsList);
        $this->display();
    }
}