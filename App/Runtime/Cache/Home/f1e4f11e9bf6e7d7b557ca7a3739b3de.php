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
    <link href="/Public/Home/Css/class.css" rel="stylesheet">
    <script>
        $(function () {
            $("#list_nav li").click(function () {
                $("#list_nav li a").removeClass("on");
                $(this).find("a").addClass("on");
                $(".list_ul").removeClass("on");
                $(".list_ul:eq(" + $(this).attr("data-index") + ")").addClass("on");
            });
        });
    </script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container classify2">
        <section data-role="body" class="body">
            <div data-role="widget" data-widget="classify_2" class="classify_2" ontouchmove="return false;" id="classify_2" style="min-height:120px;">
                <!--组件部分 开始-->
                <div class="widget_wrap box ofh">
                    <div data-role="widget" data-widget="list_nav" class="list_nav">
                        <div class="widget_wrap">
                            <div id="scroller_nav" style="position: absolute;">
                                <ul id="list_nav" class="list_nav">
                                    <?php if(is_array($classList)): $k = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k;?><li data-index="<?php echo ($k); ?>">
                                            <a href="javascript:void(0);" class="on"><?php echo ($item["name"]); ?></a>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div data-role="widget" data-widget="list_body" class="list_body">
                        <div class="widget_wrap">
                            <div id="scroller_body">
                                <div>
                                    <ul class="list_ul on" style="">
                                    </ul>
                                    <?php if(is_array($classList)): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><ul class="list_ul" style="">
                                            <?php if(is_array($item["next"])): $i = 0; $__LIST__ = $item["next"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class): $mod = ($i % 2 );++$i;?><li>
                                                    <a href="<?php echo U('Home/Goods/goodsList',array('type'=>'lastClass', 'classId'=>$class['id']));?>">
                                                        <div>
                                                            <span>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <label><?php echo ($class["name"]); ?></label>
                                                        </div>
                                                    </a>
                                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--组件部分 结束-->
            </div>
        </section>
    </div>
<div data-widget="tools" data-tools="tools_widget" id="tools_widget" class="tools_widget">
    <div class="widget_wrap">
        <ul class="tools_widget_wrap">
            <li><a href="javascript:;" id="tools_widget_goTop" class="tools_widget_goTop hidden" style="display: block;">
                    顶部</a> </li>
            <li id="tools_kfli" style=" display:none;">
                <a href="#" id="tolls_widget_message" class="tolls_widget_message">客服</a> 
            </li>
        </ul>
    </div>
</div>
</body>
</html>