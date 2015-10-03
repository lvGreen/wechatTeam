<?php
namespace Store\Controller;
use Think\Controller;

class GoodsController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 商品添加页面
     */
    public function goodsAdd(){
        //判断是否是修改
        $goodsId = I('get.id', '0', 'int');
        if($goodsId != '0'){
            $goodsModel = D('Goods');
            $condition = array();
            $condition['id'] = $goodsId;
            $condition['shop_code'] = $_SESSION['unique_code'];
            $goodsInfo = $goodsModel->getGoodsDetail($condition);
            $this->assign('goodsInfo', $goodsInfo);
        }
        
        //获取类目
        $goodsService = D('Goods','Service');
        $classInfo = $goodsService->getGoodsClass();
        $this->assign('classInfo', $classInfo);
        $this->display();
    }
    
    /**
     * 商品入库
     */
    public function addGoods(){
        $saveData = array();
        $goodsId = I('post.goodsId');
        if($_FILES){
            $upImgService = D('Upimg', 'Service');
            if($_FILES['original_img']['error'] == '0'){
                $imgUrl = $upImgService->upImg($_FILES['original_img']);
                $saveData['img'] = $imgUrl;
            }
            
            if($_FILES['goods_thumb']['error'] == '0'){
                $imgUrl = $upImgService->upImg($_FILES['goods_thumb']);
                $saveData['small_img'] = $imgUrl;
            }
        }else if($goodsId == ''){
            $this->error('请上传商品图片和缩略图！');
            exit;
        }
        $saveData['title'] = I('post.goods_name');
        $str = time().$saveData['title'];
        $saveData['goods_code'] = md5($str);
        if($saveData['title'] == ''){
            $this->error('商品名称不能为空！');
            exit;
        }
        $saveData['bar_code'] = I('post.goods_sn');
        $saveData['code'] = I('post.goods_bianhao');
        $saveData['is_new'] = I('post.is_new');
        $saveData['is_hot'] = I('post.is_hot');
        $saveData['is_recommend'] = I('post.is_recommend');
        $saveData['weight'] = I('post.goods_weight');
        
        //判断是否无限库存
        $saveData['count'] = I('post.goods_number');
        $saveData['alarm_count'] = I('post.warn_number');
        if($saveData['alarm_count'] == '0' && $saveData['count'] == '0'){
            $saveData['unless_count'] = '1';
        }else{
            $saveData['unless_count'] = '0';
        }
        
        $saveData['type'] = I('post.type');
        $saveData['class_id'] = I('post.cat_id');
        $saveData['market_price'] = I('post.market_price');
        $saveData['purchase_price'] = I('post.purchase_price');
        $saveData['discount_price'] = I('post.pifa_price');
        $saveData['price'] = I('post.shop_price');
        if($saveData['market_price'] == '' || $saveData['purchase_price'] == '' || $saveData['discount_price'] == '' || $saveData['price'] == ''){
            $this->error('请填写所有的价格！');
            exit;
        }
        $saveData['distribution_price'] = I('post.takemoney');
        if($saveData['distribution_price'] == ''){
            $saveData['distribution_price'] = 0.00;
        }
        $saveData['content'] = I('post.goods_details');
        if($saveData['content'] == ''){
            $this->error('商品描述不能为空！');
            exit;
        }
        $saveData['meta_keywords'] = I('post.meta_keys');
        $saveData['meta_dis'] = I('post.meta_desc');
        $status = I('post.is_online');
        if($status == '1'){
            $saveData['status'] = '1';
        }elseif($status == '0'){
            $saveData['status'] = '0';
        }else{
            $this->error('请选择上下架！');
            exit;
        }
        $saveData['shop_code'] = $_SESSION['unique_code'];
        $saveData['add_time'] = date('YmdHis');
        
        if($goodsId != ''){
            M('Goods')->where(array('id'=>$goodsId, 'shop_code'=>$_SESSION['unique_code']))->save($saveData);
            $this->success('商品修改成功！');
        }else{
            $goodId = M('Goods')->add($saveData);
            if($goodId){
                $this->success('商品添加成功！');
            }else{
                $this->error('商品添加失败！');
            }
        }
    }
    
    /**
     * 商品列表
     */
    public function goodsList(){
        $goodsService = D('Goods','Service');
        $classInfo = $goodsService->getGoodsClass();
        
        $goodsListModel = D('Goods');
        $condition = array();
        $classId = I('get.classId','0','int');
        if($classId != '0'){
            $condition['gs.class_id'] = $classId;
        }
        
        $status = I('get.status');
        if($status == '1'){
            $condition['gs.status'] = $status;
        }else if($status == '2'){
            $condition['gs.status'] = '0';
        }else if($status == 'hot'){
            $condition['gs.is_hot'] = '1';
        }else if($status == 'new'){
            $condition['gs.is_new'] = '1';
        }else if($status == 'recommend'){
            $condition['gs.is_recommend'] = '1';
        }
        
        $keyWords = I('get.keywords','0','string');
        if($keyWords != '' && $keyWords != '0'){
            $condition['gs.meta_keywords'] = array('like',"%{$keyWords}%");
        }
        
        $condition['gs.shop_code'] = $_SESSION['unique_code'];
        $condition['gs.status'] = '1';
        $fields = 'gs.id, gs.title, gs.price, gs.market_price, gs.purchase_price, gs.discount_price, gs.distribution_price, gs.count, gs.unless_count, gs.small_img, gs.add_time, gs.is_hot, gs.is_new, gs.is_recommend, gs.status, cs.name';
        $goodsListArray = $goodsListModel->getGoodsList($condition, $fields);
        $this->assign('goodsListArray', $goodsListArray);
        $this->assign('classInfo', $classInfo);
        $this->display();
    }
    
    /**
     * 修改商品状态（新品、热销、上下架等）
     */
    public function changeGoodsStatus(){
        $act = I('post.act');
        $goodId = I('post.goodsId','0','int');
        $result = array();
        $condition = array();
        $condition['id'] = $goodId;
        $condition['shop_code'] = $_SESSION['unique_code'];
        $goodsModel = M('Goods');
        $statusInfo = $goodsModel->where($condition)->field('is_hot, is_new, is_recommend, status')->find();
        switch($act){
            case 'sale':
                if($statusInfo['status'] == '0'){
                    M('Goods')->where($condition)->save(array('status'=>'1'));
                }else if($statusInfo['status'] == '1'){
                    M('Goods')->where($condition)->save(array('status'=>'0'));
                }
                $result['error'] = '0';
                $result['msg'] = '修改上下架成功！';
                $this->ajaxReturn($result);
                break;
            case 'hot':
                if($statusInfo['is_hot'] == '0'){
                    M('Goods')->where($condition)->save(array('is_hot'=>'1'));
                }else if($statusInfo['is_hot'] == '1'){
                    M('Goods')->where($condition)->save(array('is_hot'=>'0'));
                }
                $result['error'] = '0';
                $result['msg'] = '修改热销成功！';
                $this->ajaxReturn($result);
                break;
            case 'new':
                if($statusInfo['is_new'] == '0'){
                    M('Goods')->where($condition)->save(array('is_new'=>'1'));
                }else if($statusInfo['is_new'] == '1'){
                    M('Goods')->where($condition)->save(array('is_new'=>'0'));
                }
                $result['error'] = '0';
                $result['msg'] = '修改新品成功！';
                $this->ajaxReturn($result);
                break;
            case 'best':
                if($statusInfo['is_recommend'] == '0'){
                    M('Goods')->where($condition)->save(array('is_recommend'=>'1'));
                }else if($statusInfo['is_recommend'] == '1'){
                    M('Goods')->where($condition)->save(array('is_recommend'=>'0'));
                }
                $result['error'] = '0';
                $result['msg'] = '修改推荐成功！';
                $this->ajaxReturn($result);
                break;
            default :
                $result['error'] = '1001';
                $result['msg'] = '请制定操作！';
                $this->ajaxReturn($result);
        }
    }

}
