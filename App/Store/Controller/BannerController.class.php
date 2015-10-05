<?php
namespace Store\Controller;
use Think\Controller;

class BannerController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 广告图添加
     */
    public function bannerViewAdd(){
        $bannerId = (int) I('id');
        if($bannerId != 0){
            $bannerModel = M('Banner');
            $bannerInfo = $bannerModel->where(array('id'=>$bannerId, 'shop_code'=>$_SESSION['unique_code']))->find();
            $this->assign('bannerInfo', $bannerInfo);
        }
        
        $this->display();
    }
    
    /**
     * 广告图列表
     */
    public function bannerList(){
        $condition = array();
        $condition['shop_code'] = $_SESSION['unique_code'];
        $bannerListArray = M('Banner')->where($condition)->order('`index` desc')->select();
        $this->assign('bannerListArray', $bannerListArray);
        $this->display();
    }
    
    /**
     * 广告图入库
     */
    public function addBanner(){
        if($_FILES){
            $upImgService = D('Upimg', 'Service');
            if($_FILES['banner_pic']['error'] == '0'){
                $imgUrl = $upImgService->upImg($_FILES['banner_pic']);
            }
        }else{
            $this->error('请上传图片！');
            exit;
        }
        $saveData = array();
        $saveData['banner_img'] = $imgUrl;
        $saveData['title'] = I('post.banner_name');
        $saveData['url'] = I('post.banner_url');
        $saveData['index'] = (int) I('post.index');
        $saveData['shop_code'] = $_SESSION['unique_code'];
        $saveData['status'] = '1';
        $saveData['add_time'] = date('YmdHis');
        $bannerId = M('Banner')->add($saveData);
        if($bannerId){
            $this->success('广告图添加成功！');
        }else{
            $this->error('广告图添加失败！');
        }
    }
    
    /**
     * 修改banner状态
     */
    public function changeBannerStatus(){
        $bannerId = I('post.bannerId');
        $bannerIdArray = explode('+', $bannerId);
        $bannerModel = M('Banner');
        foreach($bannerIdArray as $val){
            $status = $bannerModel->where(array('id'=>$val, 'shop_code'=>$_SESSION['unique_code']))->getfield('status');
            if($status == '0'){
                $bannerModel->where(array('id'=>$val, 'shop_code'=>$_SESSION['unique_code']))->save(array('status'=>'1'));
            }elseif($status == '1'){
                $bannerModel->where(array('id'=>$val, 'shop_code'=>$_SESSION['unique_code']))->save(array('status'=>'0'));
            }
        }
        $this->success('修改状态成功！');
    }
    
}
