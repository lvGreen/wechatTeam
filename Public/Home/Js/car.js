var $_s = 0; 

$(function(){
	
	$("#shopcart_list_body li input[type='checkbox'][name='car[]']").prop("checked", false);
	
	// 全选
	$(".selAll").click(function(){
		if($("#checkAll").attr("ng-checked") == "true") {
			$("#checkAll").attr("ng-checked", "");
			$(".radio[name='goods_id']").attr("ng-checked", "");;
			$("input[type='checkbox'][name='car[]']").prop("checked", false); 
		} else {
			$("#checkAll").attr("ng-checked", "true");
			$(".radio[name='goods_id']").attr("ng-checked", "true");;
			$("input[type='checkbox'][name='car[]']").prop("checked", true); 
		}
		
		statistical();
	});
	
	// 删除
	$(".icon_del").click(function(){
		var $_id = "";
		$("#shopcart_list_body li input[type='checkbox'][name='car[]']:checked").each(function(){
			$(this).parent().parent().parent().parent().remove();		
			$_id += ($_id == "" ? "" : ";") + $(this).val();
		});
		if($_id == ""){
			layer.msg("选择需要删除的数据"); return false;
		}
		if($_s != 0) return false; $_s = 1;
		
		$.post("/vshop/store", {temp:"del", id:$_id}, function(data){
			$_s = 0;
			if($("#shopcart_list_body li").length == 0) {
				window.location.reload();	
			}
		}, "json");
		
		statistical();
	});
	
	// 单个商品信息的选择
	$(".one_data").click(function(){
		if($(this).find(".radio[name='goods_id']").attr("ng-checked") == "true") {
			$(this).find(".radio[name='goods_id']").attr("ng-checked", "");
			$(this).find("input[type='checkbox'][name='car[]']").prop("checked", false);
		} else {
			$(this).find(".radio[name='goods_id']").attr("ng-checked", "true");
			$(this).find("input[type='checkbox'][name='car[]']").prop("checked", true);
		}
		
		if($("#shopcart_list_body li .radio[name='goods_id'][ng-checked='true']").length == $("#shopcart_list_body li").length) {
			$("#checkAll").attr("ng-checked", "true");
		} else {
			$("#checkAll").attr("ng-checked", "");
		}
		
		statistical();
	});
	
	// 减少
	$(".reduce").click(function(){
		var obj = this;
		var cnt = parseInt($(obj).parent().next().find("input[type='text']").val());
		if(isNaN(cnt)) cnt = 1; else cnt--;
		if(cnt <= 0) { cnt = 1; return false; }
		if($_s != 0) return false; $_s = 1;
		
		var $_id = $(obj).parent().parent().parent().parent().find("input[type='checkbox'][name='car[]']").val();
		$.post("/vshop/store", {temp:"cnt", id:$_id, cnt:-1}, function(data){
			$_s = 0;
			$(obj).parent().next().find("input[type='text']").val(cnt);
			statistical();
		}, "json");
	});
	
	// 增加
	$(".plus").click(function(){
		var obj = this;
		var cnt = parseInt($(this).parent().prev().find("input[type='text']").val());
		if(isNaN(cnt)) cnt = 1; else cnt++;
		if(cnt > 99) { cnt = 99; return false; }
		if($_s != 0) return false; $_s = 1;
		
		var $_id = $(obj).parent().parent().parent().parent().find("input[type='checkbox'][name='car[]']").val();
		$.post("/vshop/store", {temp:"cnt", id:$_id, cnt:1}, function(data){
			$_s = 0;
			$(obj).parent().prev().find("input[type='text']").val(cnt);
			statistical();
		}, "json");
	});
	
	// 去结算
	$("#btn_buy").click(function() {
		var $_id = "";
		$("#shopcart_list_body li input[type='checkbox'][name='car[]']:checked").each(function(){	
			$_id += ($_id == "" ? "" : ";") + $(this).val();
		});
		if($_id == ""){
			layer.msg("选择需要结算的数据"); return false;
		}
		
		window.location.href = "/vshop/createOrder?te=car&ci="+$_id;
	});
		   
});

// 统计
function statistical() {
	var allPrice = 0, // 总价
		allCnt = 0;	// 总数量
	
	$("#shopcart_list_body li").each(function(){
		if($(this).find(".radio").attr("ng-checked") == "true") {
			// 单价
			var $_price = parseFloat($(this).find(".price").html().replace("￥", ""));
			// 数量
			var $_cnt = parseInt($(this).find("input[type='text'][name='sum']").val());
			
			allPrice += $_price * $_cnt;
			allCnt += $_cnt;
		}
	});
	
	$(".price_total").html("￥" + allPrice.toFixed(2));
	$(".cnt_total").html(allCnt);
}