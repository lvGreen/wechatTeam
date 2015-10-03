<?php
namespace Store\Service;
use Think\Controller;

class GoodsService extends Controller {
    
    /**
     * 普通分类
     * @param type $type
     * @return type
     */
    public function getGoodsClass($type, $class='1'){
        $result = array();
        if($type == 'firstLevel'){
            $result = M('Class')->where(array('shop_code'=>$_SESSION['unique_code'], 'type'=>$class, 'parent_id'=>'0','is_delete'=>array('neq','0')))->select();
        }else{
            $classInfo = M('Class')->where(array('shop_code'=>$_SESSION['unique_code'], 'type'=>$class, 'is_delete'=>array('neq','0')))->select();
            $goodsModel = M('Goods');
            foreach ($classInfo as $val){
                $goodsCount = $goodsModel->where(array('shop_code'=>$_SESSION['unique_code'], 'class_id'=>$val['id']))->count();
                $val['goods_count'] = $goodsCount;
                if($val['parent_id'] == '0'){
                    $result[$val['id']] = $val;
                }else{
                    $result[$val['parent_id']]['next'][] = $val;
                }
            }
        }
        return $result;
    }

}