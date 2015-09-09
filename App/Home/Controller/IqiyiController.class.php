<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class IqiyiController extends BaseController {
    public function index(){
        $listDataModel = M('AiqiyiAccount');
        
        $dataCount = $listDataModel->count();

        $Page = getpage($dataCount);
        $listData = $listDataModel->order('add_time desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();

        $showPage = $Page->show();
        $this->assign('page', $showPage);
        $this->assign('list', $listData);
        $this->display();
    }
}