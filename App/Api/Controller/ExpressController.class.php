<?php
namespace Api\Controller;

use Think\Controller;

class ExpressController extends BaseController {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 请访问 对外的 index 方法
     * @param string $expCom 快递公司代号
     * @param string $expNum 快递单号
     * @param array  $result
     */
    public function index($expCom, $expNum){
        $expressCountArray = F('express');
        if(empty($expressCountArray) || date('Ymd') != $expressCountArray['date']){
            $this->_createCacheFile();
            $result = $this->_kuaidi100Api($expCom, $expNum);
        }elseif($expressCountArray['kuaidi100']['count']        > 10 
             && $expressCountArray['aichaExpress']['count']     == 100
             && $expressCountArray['aikuaidi']['count']         == 100
             && $expressCountArray['kuaidi']['count']           == 100
             && $expressCountArray['kuaidiwo']['count']         == 100
                ){
            $result = $this->_kuaidi100Api($expCom, $expNum);
        }elseif($expressCountArray['kuaidi100']['count']        < 10
             && $expressCountArray['aichaExpress']['count']     > 10
             && $expressCountArray['aikuaidi']['count']         == 100
             && $expressCountArray['kuaidi']['count']           == 100
             && $expressCountArray['kuaidiwo']['count']         == 100
                ){
            $result = $this->_aichaExpress($expCom, $expNum, array('id'=>'', 'secret'=>''));
        }elseif($expressCountArray['kuaidi100']['count']        < 10
             && $expressCountArray['aichaExpress']['count']     < 10
             && $expressCountArray['aikuaidi']['count']         > 100
             && $expressCountArray['kuaidi']['count']           == 100
             && $expressCountArray['kuaidiwo']['count']         == 100
                ){
            $result = $this->_aikuaidiExpress($expCom, $expNum);
        }elseif($expressCountArray['kuaidi100']['count']        < 10
             && $expressCountArray['aichaExpress']['count']     < 10
             && $expressCountArray['aikuaidi']['count']         < 10
             && $expressCountArray['kuaidi']['count']           > 100
             && $expressCountArray['kuaidiwo']['count']         == 100
                ){
            $result = $this->_kuaidiExpress($expCom, $expNum);
        }elseif($expressCountArray['kuaidi100']['count']        < 10
             && $expressCountArray['aichaExpress']['count']     < 10
             && $expressCountArray['aikuaidi']['count']         < 10
             && $expressCountArray['kuaidi']['count']           < 10
             && $expressCountArray['kuaidiwo']['count']         > 10
                ){
            $result = $this->_kuaidiExpress($expCom, $expNum);
        }else{
            $result = $this->_kuaidi250Express($expCom, $expNum);
        }
        
        return $result;
    }
    
    /**
     * 初始化缓存文件
     * 
     */
    private function  _createCacheFile(){
        $initializationArray = array(
            'date'          =>          date('Ymd'),
            'kuaidi100'     =>          array('count'=>100),
            'aichaExpress'  =>          array('count'=>100),
            'aikuaidi'      =>          array('count'=>100),
            'kuaidi'        =>          array('count'=>100),
            'kuaidiwo'      =>          array('count'=>100),
            'kuaidi'        =>          array('count'=>100),
            
        );
        
        F('express', $initializationArray);
    }
    
    private function _kuaidi100Api($expCom, $expNum) {
        $htmlAPI = array(
            'shunfeng' => 'shunfeng',
            'youzhengguonei' => 'youzhengguonei',
            'ems' => 'ems',
            'emsen' => 'emsen',
            'youzhengguoji' => 'youzhengguoji',
            'shentong' => 'shentong',
            'shunfengen' => 'shunfengen',
            'yuantong' => 'yuantong',
            'yunda' => 'yunda',
            'zhongtong' => 'zhongtong',
        );
        
        $kuaidi100Array = C('kuaidi.kuaidi100');
        if (in_array($expCom, $htmlAPI)) {
            $url = $kuaidi100Array['urlOne'];
            $url = str_replace('[expCom]', $expCom, $url);
            $url = str_replace('[expNum]', $expNum, $url);
        } else {
            $this->_saveData('kuaidi100');
            $url = $kuaidi100Array['urlTwo'];
            $url = str_replace('[expCom]', $expCom, $url);
            $url = str_replace('[expNum]', $expNum, $url);
        }
        
        $content = http_curl($url,'','get');
        $resultArray = json_decode($content,TRUE);
        return $resultArray;
    }
    
    private function _aichaExpress($expCom, $expNum, $apiKey){
        $this->_saveData('aichaExpress');
        $aichaExpressArray = C('kuaidi.aichaExpress');
        $url = $aichaExpressArray['url'];
        $url = str_replace('[expCom]', $expCom, $url);
        $url = str_replace('[expNum]', $expNum, $url);
        $content = http_curl($url,$data,'get');
        $resultArray = json_decode($content,TRUE);
        return $resultArray;
    }
    
    private function _aikuaidiExpress($expCom, $expNum, $apiKey){
        $this->_saveData('aikuaidi');
        $aikuaidiExpressArray = C('kuaidi.aikuaidi');
        $url = $aikuaidiExpressArray['url'];
        $url = str_replace('[expCom]', $expCom, $url);
        $url = str_replace('[expNum]', $expNum, $url);
        $content = http_curl($url,$data,'get');
        $resultArray = json_decode($content,TRUE);
        return $resultArray;
    }
    
    private function _kuaidiExpress($expCom, $expNum){
        $this->_saveData('kuaidi');
        $kuaidiExpressArray = C('kuaidi.kuaidi');
        $url = $kuaidiExpressArray['url'];
        $url = str_replace('[expCom]', $expCom, $url);
        $url = str_replace('[expNum]', $expNum, $url);
        $content = http_curl($url,$data,'get');
        $resultArray = json_decode($content,TRUE);
        return $resultArray;
    }
    
    private function _kuaidiwoExpress($expCom, $expNum){
        $this->_saveData('kuaidiwo');
        $kuaidiwoExpressArray = C('kuaidi.kuaidiwo');
        $url = $kuaidiwoExpressArray['url'];
        $url = str_replace('[expCom]', $expCom, $url);
        $url = str_replace('[expNum]', $expNum, $url);
        $content = http_curl($url,$data,'get');
        $resultArray = json_decode($content,TRUE);
        return $resultArray;
    }
    
    private function _kuaidi250Express($expCom, $expNum){
        $kuaidi250ExpressArray = C('kuaidi.kuaidi250');
        $url = $kuaidi250ExpressArray['url'];
        $url = str_replace('[expCom]', $expCom, $url);
        $url = str_replace('[expNum]', $expNum, $url);
        $content = http_curl($url,$data,'get');
        $date = '/<td class="row1">(.*)<\/td><td class="(status status-first|status )">&nbsp;<\/td>/';
        $location = '/<td>(.*)<\/td>/';
        preg_match_all($date, $content, $dateMaches);
        preg_match_all($location, $content, $locationMatches);
        $result = array();
        foreach ($dateMaches[1] as $key => $val) {
            $result['data'][$key]['time'] = $val;
            $result['data'][$key]['context'] = $locationMatches[1][$key];
        }
        return $result;
    }
    
    private function _juheExpress($expCom, $expNum){
        $juheExpressArray = C('kuaidi.juhe');
        $url = $juheExpressArray['url'];
        $url = str_replace('[expCom]', $expCom, $url);
        $url = str_replace('[expNum]', $expNum, $url);
        $content = http_curl($url,$data,'get');
        $resultArray = json_decode($content,TRUE);
        return $resultArray;
    }
    
    private function _saveData($key){
        $expressCountArray = F('express');
        $expressCountArray[$key]['count'] = $expressCountArray[$key]['count'] - 1;
        F('express', $expressCountArray);
    }
}
