<?php
namespace Store\Controller;
use Think\Controller;

class BaseController extends Controller {

    function __construct() {
        parent::__construct();
        if($_SESSION['user'] == ''){
            redirect(U('Store/Index/login'));
        }
        
        $this->_getCat();
    }
    
    private function _getCat(){
        $result = array();
        $catArray = M('Catalog')->order('parent_id ASC , `index` ASC')->select();
        foreach($catArray as $val){
            if($val['url'] != ''){
                $val['url'] = U($val['url']);
            }
            if($val['parent_id'] == 0){
                $result[$val['id']] = $val;
            }else{
                $result[$val['parent_id']]['next'][] = $val;
            }
        }
        $this->assign('cat', $result);
    }

}
