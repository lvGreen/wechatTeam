<?php
namespace Store\Controller;
use Think\Controller;

class TemplateController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 模板显示页
     */
    public function Index(){
        $themeId = M('User')->where(array('user'=>$_SESSION['user']))->getfield('theme');
        $this->assign('themeId',$themeId);
        $this->display();
    }
    
    /**
     * 更改模板
     */
    public function changeThemeId(){
        $themeId = I('post.theme');
        M('User')->where(array('user'=>$_SESSION['user']))->save(array('theme'=>$themeId));
        $this->ajaxReturn(array('error'=>'0','msg'=>'修改模板成功！'));
    }
}
