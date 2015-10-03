<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {

    function __construct() {
        parent::__construct();
//        $this->checkWechatBrowser();
        if(ACTION_NAME == 'goodsDetail'){
            $goodsCode = I('get.code');
            $shopCode = M('Goods')->where(array('goods_code'=>$goodsCode))->getfield('shop_code');
        }else{
            $shopCode = I('shop');
        }
        if($_SESSION['wapShop'] != $shopCode && $shopCode != ''){
            $_SESSION['wapShop'] = $shopCode;
            $this->getShopInfo($shopCode);
            $this->getOpenId();
        }
        if($_SESSION['wapShop'] == ''){
            $this->error('您输入的URL地址有误，请核对后再输入！');
            exit;
        }
    }
    
    /**
     * 判断微信浏览器
     */
    public function checkWechatBrowser(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') === false ) {
            $this->error('请在微信中打开');
            exit;
        }
    }
    
    /**
     * 获取openid
     */
    public function getOpenId(){
        $openid = 'ok_Tas7S8rDGbcYce8u97I6g7HK8';
        $_SESSION['openid'] = $openid;
        $wechatInfo = M('wechatUser')
                ->field('nickname, headimgurl')
                ->where(array('open_id'=>$openid))
                ->find();
        $_SESSION['user'] = $wechatInfo;
    }
    
    /**
     * 获取店铺信息
     */
    public function getShopInfo($shopCode){
        $companyInfo = M('User su')
            ->join('shop_company sc ON su.id = sc.user_id')
            ->where(array('su.unique_code'=>$shopCode))
            ->field('sc.name, sc.address, sc.title, sc.logo, sc.service_phone, sc.service_qq')
            ->find();
        $_SESSION['shopInfo'] = $companyInfo;
    } 
}