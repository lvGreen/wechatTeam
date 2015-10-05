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
    <link href="/Public/Home/Css/myorder.css" rel="stylesheet">
    <link href="/Public/Home/Css/widget_menu.css" rel="stylesheet">
    <link href="/Public/Home/Css/home.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/Home/Js/skin/layer.css" id="layui_layer_skinlayercss">

    <script src="/Public/Home/Js/common.js"></script>
    <script src="/Public/Home/Js/layer.js"></script>
    <script src="/Public/Home/Js/hide.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container myorder">
        <section data-role="body" class="body">
            <div id="list_order" class="list_order" style="text-align: center;">
                <?php if($orderList == '' ): ?><img src="/Public/Home/Image/w_21.png" style="width:180px; padding-top:120px;">
                <?php else: ?>
                    <?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="orderlist">
                            <span>
                                下单时间：<?php echo dateformat($item['add_time']);?>
                                <label>￥<?php echo ($item["price"]); ?></label>
                            </span>
                            <ul>
                                <?php if(is_array($item["goods"])): $i = 0; $__LIST__ = $item["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><li>
                                        <a href="good.html">
                                            <span><img src="<?php echo getUploadUrl($good['small_img']);?>" /></span>
                                            <label>
                                                <span class="table">
                                                    <div class="line1">
                                                        <span><?php echo ($good["title"]); ?></span>
                                                    </div>
                                                    <div class="line2">
                                                        <span>￥<?php echo ($good["sogprice"]); ?></span>
                                                    </div>
                                                    <div class="line3">
                                                        <span>
                                                            &nbsp;&nbsp;
                                                            数量：<font style="color:#FF0000"><?php echo ($good["count"]); ?></font>
                                                        </span>
                                                    </div>	
                                                </span>								
                                            </label>
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <label>
                                <a class="btn fr orange" href="gopay.html">确认收货</a>
                                <a class="btn fr black" href="gopay.html">物流详情</a>
                            </label>
                        </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
            <div class="listmore">
            </div>
            <script type="text/html" id="list_show">
                <div class="orderlist">
                    <span>
                        下单时间：{__ADDTIME__}
                        <label>￥{__REALMONEY__}</label>
                    </span>
                    <ul>
                        <li>
                            <a href="/vshop/orderDetail?sn={__SN__}">
                                <span><img src="{__IMAGE__}"/></span>
                                <label>
                                    <span class="table">
                                        <div  class="line1">
                                            <span>{__NAME__}</span>
                                        </div>
                                        <div  class="line2">
                                            <span>￥{__PRICE__}</span>
                                        </div>
                                        <div  class="line3">
                                            <span>
                                                {__SPECNAME__}&nbsp;&nbsp;
                                                数量：<font style="color:#FF0000">{__COUNT__}</font>
                                            </span>
                                        </div>	
                                    </span>								
                                </label>
                            </a>
                        </li>
                    </ul>
                    <label>{__OPERATION__}</label>
                </div>
                </script>
            </section>
        </div>

        <div data-role="widget" data-widget="menu_4" class="menu_4">
            <div class="widget_wrap">
                <ul id="menu_4_ul" style="z-index:9999;">

                    <li>
                        <a href="index.html" data-fx="Modulefx">
                            <span class="wicon-home">&nbsp;</span>
                            <p>首页</p>
                        </a>
                    </li>

                    <li>
                        <a href="fenlei.html" data-fx="Modulefx">
                            <span class="wicon-mark">&nbsp;</span>
                            <p>分类</p>
                        </a>
                    </li>

                    <li class="li3">
                        <a href="index.html" data-fx="Modulefx">
                            <span class="wicon-info">&nbsp;</span>
                            <p>分销中心</p>
                        </a>
                    </li>

                    <li>
                        <a href="myorder.html" data-fx="Modulefx">
                            <span class="wicon-file">&nbsp;</span>
                            <p>我的订单</p>
                        </a>
                    </li>

                    <li>
                        <a href="/vshop/car" data-fx="Modulefx">
                            <span class="wicon-cart">&nbsp;</span>
                            <p>购物车</p>
                        </a>
                    </li>

                </ul>
            </div>
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
    <script>
        var flag, page = 1;

        $(function () {
            flag = true;
            loadInfo();

            $(window).scroll(function () {

                // 滚动高度
                var scrollTop = $(window).scrollTop();
                // 标记距顶部位置
                var top = $('.listmore').offset().top;

                if (scrollTop > top - $(window).height()) {
                    loadInfo();
                }
            });
        });

        function loadInfo() {
            if (!flag)
                return false;
            layer.load(2);
            flag = false;

            setTimeout(function () {
                $.get("/vshop/myOrder?type=2", {page: page++}, function (data) {
                    layer.closeAll('loading');

                    if (data.status == 1) {
                        if (data.data.length <= 0) {
                            if ($(".list_order").find(".orderlist").length < 1) {
                                $(".list_order").css("text-align", "center").append('<img src="/material/Public/front/shop/images/w_21.png" style="width:180px; padding-top:120px;" />');
                            } else
                                layer.msg("没有更多订单信息了");

                            flag = false;
                            return;
                        }

                        var html = $("#list_show").html();
                        $.each(data.data, function (k, v) {
                            var h = html.replaceAll("{__ADDTIME__}", getLocalTime(v.log_time)).replaceAll("{__REALMONEY__}", v.realmoney).replaceAll("{__SN__}", v.sn);
                            var o = "";
                            if (v.status == '0') {
                                o = '<a class="btn fr red" href="/vshop/pay?sn=' + v.sn + '">去付款</a>';
                                o += '<a class="btn fr black" href="javascript:;" onclick="op(\'cancel\', \'' + v.sn + '\')">取消订单</a>';
                            } else if (v.status == '1') {
                                o = '<a class="btn fr green" href="/vshop/refund?sn=' + v.sn + '">申请退款</a>';
                            } else if (v.status == '2') {
                                o = '<a class="btn fr orange" href="javascript:;" onclick="op(\'shouhuo\', \'' + v.sn + '\')">收货</a>';
                                o += '<a class="btn fr green" href="/vshop/refund?sn=' + v.sn + '">申请退货</a>';
                                if (v.logistics_name != "" && v.logistics_sn != "") {
                                    var logUrl = 'http://m.kuaidi100.com/index_all.html?type=' + v.logistics_name + '&postid=' + v.logistics_sn + '&callbackurl=' + document.location + '#result';
                                    o += '<a class="btn fr black" href="' + logUrl + '">物流信息</a>';
                                }
                            } else if (v.status == '3') {
                                o = '<a class="btn fr orange" href="/vshop/orderDetail?sn=' + v.sn + '">订单详情</a>';
                            } else if (v.status == '4') {
                                o = '<a class="btn fr green" href="/vshop/refund?sn=' + v.sn + '">退款详情</a>';
                            } else if (v.status == '5') {
                                o = '<a class="btn fr green" href="/vshop/refund?sn=' + v.sn + '">退货详情</a>';
                            } else if (v.status == '6') {
                                o = '<a class="btn fr green" href="/vshop/refund?sn=' + v.sn + '">退款详情</a>';
                                o += '<a class="btn fr black" href="javascript:;" onclick="op(\'delete\', \'' + v.sn + '\')">删除订单</a>';
                            } else if (v.status == '7') {
                                o = '<a class="btn fr green" href="/vshop/refund?sn=' + v.sn + '">退货详情</a>';
                                o += '<a class="btn fr black" href="javascript:;" onclick="op(\'delete\', \'' + v.sn + '\')">删除订单</a>';
                            } else if (v.status == '8') {
                                o = '<a class="btn fr black" href="javascript:;" onclick="op(\'delete\', \'' + v.sn + '\')">删除订单</a>';
                            } else if (v.status == '9') {
                                o = '<a class="btn fr orange" href="/vshop/orderDetail?sn=' + v.sn + '">订单详情</a>';
                            }
                            h = h.replaceAll("{__OPERATION__}", o);

                            var l = $(".list_order").append(h).find(".orderlist").length;
                            var m = $(".list_order .orderlist:eq(" + (l - 1) + ") ul").html();
                            $(".list_order .orderlist:eq(" + (l - 1) + ") ul").html("");
                            $.each(v.goods, function ($k, $v) {
                                var n = m.replaceAll("{__IMAGE__}", $v.goods_image).replaceAll("{__NAME__}", $v.goods_name).replaceAll("{__PRICE__}", $v.goods_price).replaceAll("{__SPECNAME__}", $v.goods_specname).replaceAll("{__COUNT__}", $v.goods_count);

                                $(".list_order .orderlist:eq(" + (l - 1) + ") ul").append(n);
                            });
                        });

                        flag = true;
                    }

                }, 'json');
            }, 1000);
        }

        function op(t, e) {
            if (typeof (t) == "undefined" || t == "")
                return false;

            if (t == 'shouhuo') {
                if (!confirm("确定已收货？"))
                    return false;
            }

            $.get("/vshop/orderOp", {sn: e, op: t}, function (data) {
                layer.msg(data.msg);
                if (data.status == -1 || data.status == 1) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                }

                $_s = 0;
            }, "json");
        }
    </script>
</body>
</html>