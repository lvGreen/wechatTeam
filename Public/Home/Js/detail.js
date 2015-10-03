var $_s = 0; // 1.正在加入购物车

$(function(){
	$(".spec").prop("checked", false);
		   
	var navh=$("#div_nav").offset().top;
	// 滚动固定
	$(window).scroll(function(){
		// 滚动高度
		var proh=$(window).scrollTop();
		if (proh>navh) {
			var width = $("#div_nav").parent().width();
			$("#div_nav").parent().css({'position':'fixed','top':0,'width':width+'px','z-index':199});
			//$("#div_nav").parent().next('div').css('padding-top','40px');
		} else{
			$("#div_nav").parent().css({'position':'relative', 'z-index':'0'});
			//$("#div_nav").parent().next('div').css('padding-top','40px');
		}
	});
	
	// 属性、详情的切换
	$("#div_nav li").click(function(){
		$("#div_nav li a").removeClass("on"); $(this).find("a").addClass("on");
		$(".div_sections section").removeClass("on");  $(".div_sections section:eq("+$(this).attr("data-idx")+")").addClass("on");
	});

	// 规格点击事件 - 库存、价格的更改
	$(".spec").click(function(){
		var a = Array(), deg = 0;
		$(".spec:checked").each(function(){
			a[deg++] = $(this).val();
		});
		a.sort();
		var m = a.join("_"), n;	
		$cookie = eval($("#specifications").val());
		$.each($cookie, function(k, v){
			if(v.spec_sn == m) {
				$("input[type='hidden'][name='specifications']").val(v.spec_sn);
				n = v;
				return;	
			} 
		});
		if(typeof(n) != "undefined") {
			var discount = n.discount, price = n.price, oldPrice = n.market;
			if(typeof discount != "undefined") {
				oldPrice = price;
				price = parseFloat(price) * parseFloat(discount) / 10;
			}
			
			// 微信价
			$("#label_price label").html(parseFloat(price).toFixed(2));
			// 原价
			$("#label_price_original label").html(parseFloat(oldPrice).toFixed(2));
			if(parseFloat(oldPrice) >= parseFloat(price)) $("#label_price_original label").parent().parent().show();
			else $("#label_price_original label").parent().parent().hide();
			// 库存
			$("#allCnt").html(n.inventory);
			// 分销提示
			$onePercent = parseFloat($("#onePercent").val());
			$_pr = (parseFloat(price) * $onePercent / 100).toFixed(2);
			$("#tipYongjin").html($_pr);
		}
	});
	
	// 减少
	$(".reduce").click(function(){
		var cnt = parseInt($('#sku_number').val());
		if(isNaN(cnt)) cnt = 1; else cnt--;
		if(cnt <= 0) cnt = 1;
		$('#sku_number').val(cnt);
	});
	
	// 增加
	$(".plus").click(function(){
		var cnt = parseInt($('#sku_number').val());
		if(isNaN(cnt)) cnt = 1; else cnt++;
		if(cnt > 99) cnt = 99;
		$('#sku_number').val(cnt);
	});
	
	$("#sku_number").change(function(){
		var cnt = parseInt($(this).val());
		if(isNaN(cnt) || cnt < 1) cnt = 1;
		else if(cnt > 99) cnt = 99;
		$('#sku_number').val(cnt);
	});
	
	// 加入购物车
	$("#btn_add_shopcart").click(function(){
		if(!checkInfo()) return false;
		if($_s != 0) return;
		var obj = this; $_s = 1; $(obj).css({'background-color':'silver'});
		
		$.post("/vshop/join", {
			"id" : $("#gid").val(),
			"count" : $("#sku_number").val(),
			"specSn" : $("input[type='hidden'][name='specifications']").val()
		}, function(data){
			if(data.status == -1) {
				layer.msg(data.msg);
				setTimeout(function(){
					window.location.reload();
				}, 1000);
			} else if(data.status == 0) {
				layer.msg(data.msg);
			} else if(data.status == 1) {
				getCarCnt();
				layer.msg('商品已加入购物车');
			}
			
			 $_s = 0; $(obj).css({'background-color':''});
		}, 'json');
	});
	
	// 立即购买
	$("#btn_buy").click(function(){
		if(!checkInfo()) return false;
		
		var a = Array(), deg = 0;
		$(".spec:checked").each(function(){
			a[deg++] = $(this).val();
		});
		a.sort();
		window.location.href = "/vshop/createOrder?te=goods&go="+$("#gid").val()+"&sp="+a.join("_")+"&cn="+$("#sku_number").val();
	});
	
	getCarCnt();
});

// 检查信息的正确性
function checkInfo() {
	// 规格是否已选择
	if($(".specRad").length != $(".specRad input[type='radio']:checked").length) {
		layer.msg("请选择商品规格信息"); return false;
	}
	// 判断库存
	if(parseInt($("#sku_number").val()) > parseInt($("#allCnt").html())) {
		layer.msg("很抱歉！商品库存不足！"); return false;
	}
	// 判断商品是否已下架
	if($("#shelves").length > 0 && $("#shelves").val() == "2") {
		layer.msg("很抱歉！商品已下架！"); return false;
	}
	
	return true;
}

function getCarCnt() {
	$.get("/vshop/carCnt", function(data){
		if(data.status == 1) {
			var cnt = parseInt(data.data);
			if(isNaN(cnt)) cnt = 0;
			$(".btn_add_shopcart").attr("data-count", cnt);
		}
	}, 'json');
}

function flyInfo(e) {
	var img = $('<img src="'+$_p+'/front/shop/images/gouwuche.png" width=36 height=36 style="position:absolute"/>');
	var gundH = $(window).scrollTop();
	
	var flyElm = img.clone().css('opacity', 0.75);
	$('body').append(flyElm);
	flyElm.css({
		'z-index': 90000,
		'display': 'block',
		'position': 'absolute',
		'top': e.pageY - gundH-58 +'px',
		'left': e.pageX-18+"px",
		'width': img.width() +'px',
		'height': img.height() +'px'
	});
	flyElm.animate({
		top: $('#headerShopTu').offset().top,
		left: $('#headerShopTu').offset().left,
		width: 50,
		height: 52
	}, 'slow', function() {
		flyElm.remove();
	});
}