<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>base.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>table.css"/>
    <link rel="stylesheet" href="<?php echo C('Admin_CSS_URL');?>zijin.css" />
    <script src="<?php echo C('Admin_JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <title></title>
</head>
<body>
	<ul class="nav clear">
		<li class="active">资金查询</li>
		<li>入金查询</li>
		<li>出金查询</li>
	</ul>
	<div class="">
		<form action="" method="post">							
		<table border="0" cellspacing="0" cellpadding="10" id="table1">		
		<tr><td>电话：</td><td><input type="text" name=""  class="tel1" id="" value="" /></td><td>所属机构：</td><td><input type="text" name="" class="msg1" id="" value="" /></td><td class="color-l"><input type="submit" value="查询" class="search1"/></td></tr>
	</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table2" >	
		<tr><th>序号</th><th>电话</th><th>所属机构</th><th>可用余额</th><th>商城余额</th><th>冻结余额</th></tr>
		<tr><td>1</td><td>13503816234</td><td>河南科技</td><td>2000</td><td>1000</td>
			<td>500</td>
		</tr>		
	</table>
	</div>
	<div class="meg">
	<form action="" method="post">							
	<table border="0" cellspacing="0" cellpadding="10" id="table1">		
		<tr><td>电话：</td><td><input type="text" name="" class="tel2" id="" value="" /></td><td>所属机构：</td><td><input type="text" name="" id="" value="" class="msg2"/></td><td>申请转账日期：<input type="date" /></td><td>出现转账日期：<input type="date" /></td><td class="color-l"><input type="submit" value="查询" class="search2"/></td></tr>
	</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table2" >
	
		<tr><th>序号</th><th>电话</th><th>所属机构</th><th>转账类型</th><th>转账金额</th><th>申请时间</th><th>处理时间</th><th>流水号</th><th>状态</th></tr>
		<tr><td>1</td><td>13503816234</td><td>河南科技</td><td>在线</td><td>5000</td>
			<td>2017-06-08</td><td>2017-06-09</td><td>13213213</td><td class="color-g">成功</td>
		</tr>
		
	</table>
	</div>
	<div class="meg">
		<form action="" method="post">							
		<table border="0" cellspacing="0" cellpadding="10" id="table1">		
		<tr><td>电话：</td><td class="td-tel"><input type="text" name=""  class="tel3" id="" value="" /></td><td>所属机构：</td><td><input type="text" name="" class="msg2" id="" value="" /></td><td>申请转账日期：<input type="date" /></td><td>出现转账日期：<input type="date" /></td><td class="color-l"><input type="submit" value="查询" class="search3" /></td></tr>
	</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table2" >	
		<tr><th>序号</th><th>电话</th><th>所属机构</th><th>收款账号</th><th>收款金额</th><th>申请时间</th><th>处理时间</th><th>流水号</th><th>状态</th></tr>
		<tr><td>1</td><td>13503816234</td><td>河南科技</td><td>62212121212</td><td>2000</td>
			<td>2017-06-08</td><td>2017-06-09</td><td>13213213</td><td class="color-g">成功</td>
		</tr>		
	</table>
	</div>
	
	
	
	
	
	
	

</body>
<script type="text/javascript">
	$('.nav>li').click(function(){
		tabs(this);
	});			
	function tabs(obj){
		var index =$(obj).index()
		$(obj).siblings().removeClass('active');
		$(obj).addClass('active');
		$(obj).parent().siblings('div').hide()
		$(obj).parent().siblings('div').eq(index).show();
	};
$('.search2').click(function(e){
	e.stopPropagation();
	var a = $('.msg2').val();
	$('.msg2').val(a);
	var t =$('.tel2').val();
	$('.tel2').val(t);
	$('.msg2').focus()	
})
$('.search1').click(function(e){
	e.stopPropagation();
	var a = $('.msg1').val();
	$('.msg1').val(a);
	var t =$('.tel1').val();
	$('.tel1').val(t);
	$('.msg1').focus()	
})
$('.search3').click(function(e){
	e.stopPropagation();
	var a = $('.msg3').val();
	$('.msg3').val(a);
	var t =$('.tel3').val();
	$('.tel3').val(t);
	$('.msg3').focus()	
})
</script>

</html>