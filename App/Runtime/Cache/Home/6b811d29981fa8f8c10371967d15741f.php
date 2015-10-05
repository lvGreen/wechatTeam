<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
    <meta charset="utf-8">
<title><?php echo ($title); ?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Keywords" content="<?php echo ($mataKeyWords); ?>">
<meta name="Description" content="<?php echo ($mataKeyDis); ?>">
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link href="/Public/Home/Css/reset.css" rel="stylesheet">
<link href="/Public/Home/Css/common.css" rel="stylesheet">

<script type="text/javascript" src="/Public/Home/Js/jquery-1.9.1.js"></script>
<script src="/Public/Home/Js/com.js"></script>
    <link href="/Public/Home/Css/faq.css" rel="stylesheet">
    <script type="text/javascript" src="/Public/Home/Js/common.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container faq">
        <div class="body">
            <header data-role="header"></header>
            <section data-role="body" class="body">
                <div>
                    <ul id="list_ul" class="list_ul" ontouchstart="" onselectstart="return false;">
                        <?php if(is_array($newsList)): $i = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="question">
                                <dl>
                                    <dt id="article_1001"><?php echo ($item["title"]); ?>？</dt>
                                    <dd><?php echo ($item["content"]); ?></dd>
                                </dl>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <script>
        $(function () {
            $(".question").click(function () {
                $(this).find("dd").toggle(function () {
                    alert('a');
                }, function () {

                });
            });
        });

        function onBridgeReady() {
            WeixinJSBridge.call('showOptionMenu');
        }

        if (typeof WeixinJSBridge == "undefined") {
            if (document.addEventListener) {
                document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
            } else if (document.attachEvent) {
                document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
            }
        } else {
            onBridgeReady();
        }
    </script>
</body>
</html>