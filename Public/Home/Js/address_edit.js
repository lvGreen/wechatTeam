
var $_s = 0;

$(function(){
		   
	$("#btn_save_address").click(function(){
		if($.trim($("#name").val()) == "") { layer.msg("姓名不能为空"); $("#name").focus(); return false; }
		if($.trim($("#tel").val()) == "") { layer.msg("电话不能为空"); $("#tel").focus(); return false; }
		if($.trim($("#address").val()) == "") { layer.msg("地址不能为空"); $("#address").focus(); return false; }
		
		var obj = this;
		if($_s == 1) return false;
		$_s = 1; $(obj).css("background-color", "silver");
		
		$('#form_list_address').ajaxSubmit({
			url:"/vshop/editAddress/",
			type:"POST",
			dataType: 'json',
			success:function(data, st) {
				layer.msg(data.msg);
				if(data.status == -1) {
					setTimeout(function(){ window.location.reload(); }, 1000);
				} else if(data.status == 1) {
					setTimeout(function(){ window.location.href = "/vshop/address?url=" + $("input[name='url']").val(); }, 1000);
				}
				$_s = 0; $(obj).css("background-color", "");
			}
		});
	});
	
	$("#btn_delete_address").click(function(){
		if($_s != 0) return false;
		$_s = 1;
											
		layer.load(2);
		setTimeout(function(){
			$.post("/vshop/delAddress", {id:$("input[name='id']").val()}, function(data){
				layer.closeAll('loading');
				if(data.status == -1) {
					layer.msg(data.msg);
					setTimeout(function(){ window.location.reload(); }, 1000);
				}  else if(data.status == 1) {
					window.location.href = "/vshop/address?url=" + $("input[name='url']").val();
				}
			}, "json");
		}, 1000);
	});
		   
});