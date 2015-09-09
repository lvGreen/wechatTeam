<?php

return array(
    'kuaidi' => array(
        'kuaidi100'     =>array(
            'urlOne'        =>'http://www.kuaidi100.com/query?id=1&type=[expCom]&postid=[expNum]&valicode=',
            'urlTwo'        =>'http://api.kuaidi100.com/api?id=    &valicode=io&com=[expCom]&nu=[expNum]&show=2&muti=1&order=desc',
            ),
        'aichaExpress'  =>array(
            'url'           =>'http://api.ickd.cn/?id=    &secret=   &com[expCom]&nu=[expNum]&type=json&encode=utf8&ord=desc'
        ),
        'aikuaidi'      =>array(
            'url'           => 'http://www.aikuaidi.cn/rest/?key=   &order=[expCom]&id=[expCom]&ord=desc&show=json'
        ),
        'kuaidi'        =>array(
            'url'           =>'http://www.kuaidiapi.cn/rest/?uid=   &key=   &order=[expNum]&id=[expCom]&ord=desc&show=json'
        ),
        'kuaidiwo'      =>array(
            'url'           =>'http://api.kuaidiwo.cn:88/api/?key＝  &com=[expCom]&cno=[expNum]&lan=0&type=json&encode=utf-8&sort=desc'
        ),
        'kuaidi250'     =>array(
            'url'           =>'http://kd250.com/api_blank.html?com=[expCom]&nu=[expNum]'
        ),
        'juhe'          =>array(
            'url'           =>'http://v.juhe.cn/exp/index?key=  &com=[expCom]&no=[expNum]&dtype=json'
        )
    ),
    
    'wechat'=>array(
        'appid'         =>      'wx98f7c52db32b1160',
        'appsecret'     =>      '3f85ccf23c7315cff4a4753980c6005a'
    ),
    
    'mail'=>array(
        'MAIL_HOST' =>'smtp.163.com',//smtp服务器
        'MAIL_USERNAME' =>'shenlight0901@163.com',//邮箱用户名
        'MAIL_PASSWORD' =>'sl090113',//邮箱密码
        'MAIL_PORT' =>25,
        'MAIL_FROMNAME' =>'badass little pig',//发件人姓名
        'MAIL_FROM' =>'shenlight0901@163.com',//发件人地址
        'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
        'MAIL_CHARSET' =>'utf-8',//设置邮件编码格式
        'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
        'MAIL_LENGTH' =>150,//设置每行字符长度
    ),
    'marketIndex'=>array(
            'target'        =>3600,
            'url'           =>'http://hq.sinajs.cn/list=[name]',
            'name'          =>array('sh000001'),
        ),
);