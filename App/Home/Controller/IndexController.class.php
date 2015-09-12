<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class IndexController extends BaseController {
    public function index(){
        $listDataModel = M('wechat');
        dump($listDataModel->select());
        exit;
        
        $dataCount = $listDataModel->count();

        $Page = getpage($dataCount);
        $listData = $listDataModel->order('periods Desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();

        $showPage = $Page->show();

        $this->assign('page', $showPage);
        $this->assign('list', $listData);
        $this->display();
    }

    public function chart(){
        $dataAnalyseModel = M('DataAnalyse');
        $dataArray = $dataAnalyseModel->select();
        $result = array();
        foreach($dataArray as $key=>$val){
            $result[$key] = $val['first_time'].','.$val['second_time'].','.$val['third_time'].','.$val['forth_time'].','.$val['fifth_time'].','.$val['sixth_time'].','.$val['red_ball_count'].','.$val['blue_ball_count'];
        }
        $this->assign('data',$result);
        $this->display();
    }
}