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
    public function index() {
        $this->assign('title', '首页');
        $goodsModel = M('Goods');
        $goodsCount = $goodsModel->where(array('shop_code' => $_SESSION['unique_code']))->count();
        $recommendGoodsCount = $goodsModel->where(array('shop_code' => $_SESSION['unique_code'], 'is_recommend' => '1'))->count();
        $onlineGoodsCount = $goodsModel->where(array('shop_code' => $_SESSION['unique_code'], 'status' => '1'))->count();
        $offlineGoodsCount = $goodsCount - $onlineGoodsCount;

        $orderModel = M('order');
        $orderCount = $orderModel->where(array('shop_code' => $_SESSION['unique_code']))->count();
        $successOrderCount = $orderModel->where(array('shop_code' => $_SESSION['unique_code'], 'status' => '3'))->count();
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mac')) {
            $oprationSystem = 'Mac';
        } else {
            $oprationSystem = 'Windows';
        }

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome')) {
            $browser = 'Chrome';
        } else {
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
    public function viewCompanyConf() {
        $this->assign('title', '信息设置');
        $companyModel = M('Company');
        $companyInfo = $companyModel->where(array('user_id' => $_SESSION['userId']))->find();
        if ($companyInfo) {
            $companyInfo['logo'] = getUploadUrl($companyInfo['logo']);
            $this->assign('edit', 'edit');
        }
        $this->assign('companyInfo', $companyInfo);
        $this->display();
    }

    /**
     * 信息入库
     */
    public function setCompanyConf() {
        $type = I('post.type');
        $saveData = array();
        $saveData['name'] = I('post.site_name', '0', 'string');
        $saveData['address'] = I('post.company_addr', '0', 'string');
        $saveData['service_phone'] = I('post.custome_phone', '0', 'string');
        $saveData['service_qq'] = I('post.custome_qq', '0', 'string');
        $saveData['kuaishang_service'] = I('post.custome_email', '0', 'string');
        $saveData['title'] = I('post.site_title');
        $isSetSendEmail = I('post.setSendEmail');
        if ($isSetSendEmail == '1') {
            $saveData['is_set_send_email'] = '1';
            $saveData['send_email'] = I('post.sendEmail');
            $saveData['email_password'] = I('post.sendEmailPass');
        } elseif ($isSetSendEmail == '2') {
            $saveData['is_set_send_email'] = '2';
        }
        
        $saveData['introduction'] = I('post.aboutCompany');
        if($saveData['introduction'] == ''){
            $this->error('请填写公司简介！');
            exit;
        }

        if ($_FILES['site_logo']['tmp_name']) {
            $date = date("Ymd");
            $uploadImgDir = C('uploadPath').$_SESSION['unique_code'].'/';
            if(!is_dir($uploadImgDir)){
                mkdir($uploadImgDir);
            }
            $uploadImgDir .= $date.'/';
            if(!is_dir($uploadImgDir)){
                mkdir($uploadImgDir);
            }
            
            $uploadImgMaxSize = C('allowedUploadSize');
            if($_FILES['site_logo']['size'] >= $uploadImgMaxSize){
                $this->error('上传图片不能大于4M');
                exit;
            }
            
            $uploadImg = C('allowedUploadImg');
            if(in_array($_FILES['site_logo']['type'], $uploadImg)){
                $file = explode('/', $_FILES['site_logo']['type']);
                $fileName = time().'.'.array_pop($file);
                $filePath = $uploadImgDir.$fileName;
                $savePath = $date.'/'.$fileName;
            }else{
                $this->error('文件格式不对！');
                exit;
            }
            
            $result = move_uploaded_file($_FILES['site_logo']['tmp_name'], $filePath);
            if($result){
                $saveData['logo'] = $savePath;
            }else{
                $this->error('文件上传失败！');
                exit;
            }
        }


        if ($type == 'edit') {
            $infoId = I('post.info');
            M('Company')->where(array('id'=>$infoId, 'user_id'=>$_SESSION['userId']))->save($saveData);
        } else {
            $saveData['user_id'] = $_SESSION['userId'];
            $adId = M('Company')->add($saveData);
        }
        $this->success('操作成功！');
    }

    /**
     * 分销设置
     */
    public function viewDistributionConf() {
        
    }

    /**
     * 分销设置入库
     */
    public function setDistributionConf() {
        
    }

}
