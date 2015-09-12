<?php

namespace Api\Controller;

use Think\Controller;

class MarketController extends BaseController {            
    function __construct() {
        parent::__construct();
    }
    
    function grapMarket($marketName){
        $marketConfig = C('marketIndex');
        $url = $marketConfig['url'];
        $str = '';
        foreach($marketName as $val){
            $str .= $val;
        }
        $url = str_replace('[name]', $str, $url);
        $content = http_curl($url,'','get');
        $content = iconv('GBK','UTF8',$content);
        $contentArray = explode(',', $content);
        return $contentArray;
    }
}
