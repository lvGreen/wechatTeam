<?php

return array(
    'URL_MODEL'=>0,
    'DEFAULT_MODULE'=>'Home',
    'MODULE_ALLOW_LIST'=>array('Home', 'Store', 'Api'),
    'LOAD_EXT_CONFIG' => 'configdb',
    'DEFAULT_CHARSET'=>'utf-8',
    'SESSION_AUTO_START'=>true,
    'upload_file_max_size'=>1024*1024,
    'DOWN_TEMP' => APP_PATH.'Upload/downTemp/',
    'wechat'=>array('appID'=>'wx98f7c52db32b1160','appsecret'=>'3f85ccf23c7315cff4a4753980c6005a','token'=>'7bdaebbced1198f1a3eb4ef79f89f915'),
);
