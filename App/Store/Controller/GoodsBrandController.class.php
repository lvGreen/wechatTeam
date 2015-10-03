<?php
namespace Store\Controller;
use Think\Controller;

class GoodsBrandController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 商品分类列表
     */
    public function goodsClassList(){
        $goodsService = D('Goods', 'Service');
        $classInfo = $goodsService->getGoodsClass();
        $this->assign('classInfo', $classInfo);
        $this->display();
    }
    
    /**
     * 商品分类添加页
     */
    public function viewGoodsClass(){
        $goodsId = I('get.id','0','int');
        if($goodsId){
            $ClassModel = M('Class');
            $singleClassInfo = $ClassModel->where(array('id'=>$goodsId,'shop_code'=>$_SESSION['unique_code']))->find();
            $singleClassInfo['adImgUrl'] = getUploadUrl($singleClassInfo['ad_img']);
            $singleClassInfo['classLogoUrl'] = getUploadUrl($singleClassInfo['class_logo']);
            $this->assign('singleClassInfo', $singleClassInfo);
        }
        $goodsService = D('Goods', 'Service');
        $classInfo = $goodsService->getGoodsClass('firstLevel');
        $this->assign('classInfo', $classInfo);
        $this->display();
    }
    
    /**
     * 商品分类入库
     */
    public function addGoodsClass(){
        $saveData = array();
        $classId = I('post.id');
        $saveData['name'] = I('post.cat_name');
        if($saveData['name'] == ''){
            $this->error('分类名称不能为空！');
            exit;
        }
        $saveData['title'] = I('post.cat_title');
        $saveData['parent_id'] = I('post.parent_id');
        $saveData['index'] = I('post.sort_order');
        $saveData['is_delete'] = I('post.is_show');
        $saveData['keywords'] = I('post.keywords');
        $saveData['desc'] = I('post.cat_desc');
        if($_FILES){
            $upImgService = D('Upimg', 'Service');
            if($_FILES['cat_img']['error'] == '0'){
                $imgUrl = $upImgService->upImg($_FILES['cat_img']);
                $saveData['ad_img'] = $imgUrl;
            }
            
            if($_FILES['cat_icon']['error'] == '0'){
                $imgUrl = $upImgService->upImg($_FILES['cat_icon']);
                $saveData['class_logo'] = $imgUrl;
            }
        }
        
        if($classId != ''){
            $dataId = M('Class')->where(array('id'=>$classId, 'shop_code'=>$_SESSION['unique_code']))->save($saveData);
        }else{
            $saveData['shop_code'] = $_SESSION['unique_code'];
            $saveData['add_time'] = date('YmdHis');
            $dataId = M('Class')->add($saveData);
        }
        $this->success('操作成功！');
    }
    
    /**
     * 修改分类状态
     */
    public function changeClassStatus(){
        $classID = I('post.classId', '0' ,'string');
        if($classID == '0'){
            $this->ajaxReturn(array('error'=>'1001','msg'=>'请点击商品分类'));
            exit;
        }
        $condition = array();
        $condition['shop_code'] = $_SESSION['unique_code'];
        $condition['id'] = $classID;
        $classModel = M('Class');
        $classStatus = $classModel->where($condition)->getField('is_delete');
        if($classStatus != '1' && $classStatus != '2' && $classStatus != '0'){
            $this->ajaxReturn(array('error'=>'2001', 'msg'=>'请核对身份之后再提交'));
            exit;
        }
        
        if($classStatus == '1'){
            $sql = "UPDATE `shop_class` SET `is_delete`='2' WHERE `shop_code` = '{$_SESSION['unique_code']}' AND (`id` = {$classID} OR parent_id = {$classID})";
        }elseif ($classStatus == '2' || $classStatus == '0'){
            $sql = "UPDATE `shop_class` SET `is_delete`='1' WHERE `shop_code` = '{$_SESSION['unique_code']}' AND (`id` = {$classID} OR parent_id = {$classID})";
        }
        $classModel->execute($sql);
        $this->ajaxReturn(array('error'=>'0', 'msg'=>'修改成功！'));
    }
    
    public function delClassStatus(){
        $idStr = I('post.str');
        $idArray = explode('+',$idStr);
        foreach($idArray as $val){
            $sql = "UPDATE `shop_class` SET `is_delete`='0' WHERE `shop_code` = '{$_SESSION['unique_code']}' AND (`id` = {$val} OR parent_id = {$val})";
            M('Class')->execute($sql);
        }
        $this->ajaxReturn(array('error'=>'0','msg'=>'操作成功！'));
    }
    
    /**
     * 品牌列表
     */
    public function goodsBrandList(){
        $brandList = M('Class')->where(array('shop_code'=>$_SESSION['unique_code'], 'type'=>'2'))->select();
        foreach($brandList as $key=>$val){
            $brandList[$key]['goodsCount'] = M('Goods')->where(array('brand_id'=>$val['id']))->count();
        }
        $this->assign('brandList', $brandList);
        $this->display();
    }
    
    /**
     * 品牌添加页
     */
    public function viewGoodsBrand(){
        $brandId = I('get.id','0','int');
        if($brandId){
            $brandInfo = M('Class')->where(array('id'=>$brandId, 'shop_code'=>$_SESSION['unique_code'], 'type'=>'2'))->find();
            $this->assign('brandInfo', $brandInfo);
        }
        $this->display();
    }
    
    /**
     * 品牌入库
     */
    public function addBrandList(){
        $saveData = array();
        $classId = I('post.id');
        $saveData['name'] = I('post.cat_name');
        if($saveData['name'] == ''){
            $this->error('分类名称不能为空！');
            exit;
        }
        $saveData['title'] = I('post.cat_title');
        $saveData['parent_id'] = '0';
        $saveData['index'] = I('post.sort_order');
        $saveData['is_delete'] = I('post.is_show');
        $saveData['keywords'] = I('post.keywords');
        $saveData['desc'] = I('post.cat_desc');
        if($_FILES){
            $upImgService = D('Upimg', 'Service');
            if($_FILES['cat_img']['error'] == '0'){
                $imgUrl = $upImgService->upImg($_FILES['cat_img']);
                $saveData['ad_img'] = $imgUrl;
            }
            
            if($_FILES['cat_icon']['error'] == '0'){
                $imgUrl = $upImgService->upImg($_FILES['cat_icon']);
                $saveData['class_logo'] = $imgUrl;
            }
        }
        
        if($classId != ''){
            $dataId = M('Class')->where(array('id'=>$classId, 'shop_code'=>$_SESSION['unique_code']))->save($saveData);
        }else{
            $saveData['shop_code'] = $_SESSION['unique_code'];
            $saveData['add_time'] = date('YmdHis');
            $saveData['type'] = '2';
            $dataId = M('Class')->add($saveData);
        }
        $this->success('操作成功！');
    }
    
    /**
     * 修改品牌状态
     */
    
    public function changeBrandStatus(){
        
    }
}
