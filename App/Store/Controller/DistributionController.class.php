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
        $newsId = I('get.newsId','0','int');
        if($newsId != '0'){
            $newsInfo = M('News')->where(array('id'=>$newsId, 'shop_code'=>$_SESSION['unique_code']))->find();
            $this->assign('newsInfo', $newsInfo);
        }
        $this->display();
    }
    
    /**
     * 分销设置入库
     */
    public function addDistributionConfig(){
        $saveData = array();
    }
    
}
