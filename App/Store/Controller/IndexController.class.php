<?php
namespace Store\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function grabPage(){
        $dateAndPeriods = '/<td align="center">(.*)<\/td>/';
        $redBall = '/<em class="rr">(.*)<\/em>/';
        $blueBall = '/<em>(.*)<\/em>/';
        for($i = 91;$i>0;$i--){
            $result = array();
            $url = 'http://kaijiang.zhcw.com/zhcw/html/ssq/list_'.$i.'.html';
            $content = http_curl($url,'','get');
            preg_match_all($dateAndPeriods, $content, $dateMaches);
            preg_match_all($redBall, $content, $redBallMaches);
            preg_match_all($blueBall, $content, $blueBallMaches);
            
            $len = count($dateMaches[1]);
            for($j=2;$j<$len;$j += 3){
                $result[$j]['date'] = str_replace('-','',$dateMaches[1][($j-2)]);
                $result[$j]['periods'] = $dateMaches[1][($j-1)];
                $result[$j]['red_ball_one'] = $redBallMaches[1][($j-2)];
                $result[$j]['red_ball_two'] = $redBallMaches[1][($j-1)];
                $result[$j]['red_ball_three'] = $redBallMaches[1][($j)];
                $result[$j]['red_ball_four'] = $redBallMaches[1][($j+1)];
                $result[$j]['red_ball_five'] = $redBallMaches[1][($j+2)];
                $result[$j]['red_ball_six'] = $redBallMaches[1][($j+3)];
                $result[$j]['blue_ball'] = $blueBallMaches[1][($j/3)];
                $result[$j]['add_time'] = date('YmdHis');
            }
            
            $modelService = D('User','Model');
            $modelService->prizeAdd($result);
        }
    }
    
    public function getOneDayData(){
        $dateAndPeriods = '/<td align="center">(.*)<\/td>/';
        $redBall = '/<em class="rr">(.*)<\/em>/';
        $blueBall = '/<em>(.*)<\/em>/';
        
        $result = array();
        $url = 'http://kaijiang.zhcw.com/zhcw/html/ssq/list.html';
        $content = http_curl($url,'','get');
        preg_match_all($dateAndPeriods, $content, $dateMaches);
        preg_match_all($redBall, $content, $redBallMaches);
        preg_match_all($blueBall, $content, $blueBallMaches);
        
        $j = 2;
        $result[$j]['date'] = str_replace('-', '', $dateMaches[1][($j-2)]);
        $result[$j]['periods'] = $dateMaches[1][($j-1)];
        $result[$j]['red_ball_one'] = $redBallMaches[1][($j-2)];
        $result[$j]['red_ball_two'] = $redBallMaches[1][($j-1)];
        $result[$j]['red_ball_three'] = $redBallMaches[1][($j)];
        $result[$j]['red_ball_four'] = $redBallMaches[1][($j+1)];
        $result[$j]['red_ball_five'] = $redBallMaches[1][($j+2)];
        $result[$j]['red_ball_six'] = $redBallMaches[1][($j+3)];
        $result[$j]['blue_ball'] = $blueBallMaches[1][($j/3)];
        $result[$j]['add_time'] = date('YmdHis');
        if (date('Ymd') == $result[$j]['date']){
            $modelService = D('prize');
            $modelService->prizeAdd($result);
        }else{
            exit;
        }
    }
    
    function createAnalizeTable(){
        $dataAnalyseModel = M('DataAnalyse');
        for($i=1;$i<34;$i++){
            $dataAnalyseModel->add(array('number'=>$i));
        }
    }
    
    function test(){
        echo phpinfo();
    }
}