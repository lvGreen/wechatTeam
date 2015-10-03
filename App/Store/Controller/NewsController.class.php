<?php
namespace Store\Controller;
use Think\Controller;

class NewsController extends BaseController {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 新闻添加页面
     */
    public function newsAdd(){
        $newsId = I('get.newsId','0','int');
        if($newsId != '0'){
            $newsInfo = M('News')->where(array('id'=>$newsId, 'shop_code'=>$_SESSION['unique_code']))->find();
            $this->assign('newsInfo', $newsInfo);
        }
        $this->display();
    }
    
    /**
     * 新闻入库
     */
    public function addNews(){
        $saveData = array();
        $newsId = I('post.newsId');
        $saveData['title'] = I('post.news_name', '0', 'string');
        if($saveData['title'] == '0'){
            $this->error('新闻标题不能为空！');
            exit;
        }
        $saveData['content'] = I('post.news_content');
        $saveData['index'] = (int) I('post.index');
        $newsModel = M('News');
        if($newsId){
            $newsModel->where(array('id'=>$newsId, 'shop_code'=>$_SESSION['unique_code']))->save($saveData);
            $this->success('修改成功！');
            exit;
        }else{
            $saveData['status'] = '1';
            $saveData['add_time'] = date('YmdHis');
            $saveData['shop_code'] = $_SESSION['unique_code'];
            $newsId = $newsModel->add($saveData);
            if($newsId){
                $this->success('添加新闻成功！');
            }else{
                $this->error('添加新闻失败！');
            }
        }
    }
    
    /**
     * 新闻列表
     */
    public function newsList(){
        $newsModel = M('News');
        $newsList = $newsModel->where(array('shop_code'=>$_SESSION['unique_code']))->order('`index` desc')->select();
        $this->assign('newsList', $newsList);
        $this->display();
    }
    
    /**
     * 改变新闻状态
     */
    public function changeNewsStatus(){
        $result = array();
        $newsId = I('post.NewsId');
        $newsIdArrary = explode('+', $newsId);
        $newsModel = M('News');
        foreach($newsIdArrary as $val){
            $status = $newsModel->where(array('id'=>$val, 'shop_code'=>$_SESSION['unique_code']))->getfield('status');
            if($status == '1'){
                $newsModel->where(array('id'=>$val, 'shop_code'=>$_SESSION['unique_code']))->save(array('status'=>'0'));
            }elseif($status == '0'){
                $newsModel->where(array('id'=>$val, 'shop_code'=>$_SESSION['unique_code']))->save(array('status'=>'1'));
            }
        }
        $result['error'] = '0';
        $result['msg'] = '修改状态成功！';
        $this->ajaxReturn($result);
    }
}
