<?php
namespace Store\Model;
use Think\Model;

class UserModel extends Model{
//    function __construct() {
//        parent::__construct();
//    }

    function prizeAdd($data){
        $prizeModel = M('Prize');
        $dataAnalyseModel = M();

        foreach($data as $val){
            $id = $prizeModel->add($val);
            $sql = 'UPDATE `ball_data_analyse` SET `first_time`=first_time+1 ,`red_ball_count` = red_ball_count+1 WHERE `number` = '.$val['red_ball_one'];
            $dataAnalyseModel->execute($sql);
            
            $sqlTwo = 'UPDATE `ball_data_analyse` SET `second_time`=second_time+1 ,`red_ball_count` = red_ball_count+1 WHERE `number` = '.$val['red_ball_two'];
            $dataAnalyseModel->execute($sqlTwo);
            
            $sqlThree = 'UPDATE `ball_data_analyse` SET `third_time`=third_time+1 ,`red_ball_count` = red_ball_count+1 WHERE `number` = '.$val['red_ball_three'];
            $dataAnalyseModel->execute($sqlThree);
            
            $sqlFour = 'UPDATE `ball_data_analyse` SET `forth_time`=forth_time+1 ,`red_ball_count` = red_ball_count+1 WHERE `number` = '.$val['red_ball_four'];
            $dataAnalyseModel->execute($sqlFour);
            
            $sqlFive = 'UPDATE `ball_data_analyse` SET `fifth_time`=fifth_time+1 ,`red_ball_count` = red_ball_count+1 WHERE `number` = '.$val['red_ball_five'];
            $dataAnalyseModel->execute($sqlFive);
            
            $sqlSix = 'UPDATE `ball_data_analyse` SET `sixth_time`=sixth_time+1 ,`red_ball_count` = red_ball_count+1 WHERE `number` = '.$val['red_ball_six'];
            $dataAnalyseModel->execute($sqlSix);
            
            $sqlBlue = 'UPDATE `ball_data_analyse` SET `blue_ball_count` = blue_ball_count+1 WHERE `number` = '.$val['blue_ball'];
            $dataAnalyseModel->execute($sqlBlue);
        }
        return $id;
    }
    
}
