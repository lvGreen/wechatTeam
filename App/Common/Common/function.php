<?php

/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 10) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false; //最后一页不显示为总页数
    return $p;
}

/**
 * TODO     curl 请求数据
 * @param   string $url     基础地址
 * @param   array  $data    请求数据
 * @param   string $type    curl提交类型
 * @return  mixed  $output 
 */
function http_curl($url, $data = '', $type = 'get') {
      $ch = curl_init();
      if($type == 'get' && $data != ''){
          $url = $url.'?';
          foreach($data as $key=>$val){
              $url .= '&'.$key.'='.$val;
          }
      }
      curl_setopt($ch , CURLOPT_URL, $url);
      curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);

      if($type == 'get'){
        curl_setopt($ch , CURLOPT_HEADER, 0);
      }else{
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      }
      
      $output = curl_exec($ch);
      curl_close($ch);
    return $output;
}

/**
 * 
 * @param string $content
 * @param array  $rule
 * @param array  $result
 */
function check_str($content,$rule){
    $result = array();
    switch($rule['strtype']){
        case 'mobile':
            if(preg_match("/^1[34578][0-9]{9}$/",$content)){
                return TRUE;
            }else{
                $result['error'] = '10001';
                $result['msg']   = '手机格式错误';
                return $result;
            }
            break;
    }
}

/**
 * 
 * @param string $str 日期
 * @param string $format 格式
 * @return string 指定格式的日期
 */
function dateformat($str, $format = 'Y-m-d H:i:s') {
    $str = trim($str);
    if (!$str)
        return false;
    $date = strtotime($str);
    if (!$date)
        return $str;

    //微信消息管理自定格式，
    if ($format == 'defined1') {
        //今天
        $day = date('Ymd', $date);
        $time = date('H:i', $date);
        if ($day == date('Ymd', strtotime("-1 day"))) {
            $time = '昨天&nbsp;&nbsp;&nbsp;' . $time;
        } else if ($day != date('Ymd')) {
            $week = array('星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日');
            $time = $week[date('w', $date)] . $time;
        }
        $date = $time;
    } else {
        $date = date($format, $date);
        if (strpos($date, '1970') === 1)
            return $str;
    }
    return $date;
}

/**
 * 获取上传文件路径
 * @param type $str
 * @return string
 */
function getUploadUrl($str){
    if(C('type') == 'Home'){
        $url = C('adminUploadUrl').$_SESSION['wapShop'].'/'.$str;
    }else if(C('type') == 'Store'){
        $url = C('adminUploadUrl').$_SESSION['unique_code'].'/'.$str;
    }
    return $url;
}