<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>base.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>table.css"/>
    <script src="<?php echo C('Admin_JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <title></title>
    <style type="text/css">
    	 body{width: 100%;height:600px;}
    	.pop{height: 100px;}
    	.sub,.add{text-align: center;padding-right: 5px;}
    	.count{width: 50px;}   	
    </style>
</head>
<body>
	<form action="" method="post">				
	<table border="0" cellspacing="0" cellpadding="10" id="table1">		
		<tr><td>电话：</td><td><input type="text" name="" id="" value=""  class="tel"/></td><td>所属机构：</td><td><input type="tel" class="msg" name="" id="" value="" /></td><td class="color-l"><input type="submit" value="查询" class="search"/></td></tr>
	</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table2" >
	
		<tr><th>序号</th><th>电话</th><th>品种</th><th>所属机构</th><th>建仓均价</th><th>持仓总量</th><th>发售时间</th><th>建仓时间</th><th>操作</th></tr>
		<tr><td>1</td><td>13503816234</td><td>日精</td><td>河南科技</td><td>2000</td><td>2000</td>
			<td>2017-06-09</td><td>2017-06-09</td><td class="color-l set">交割</td>
		</tr>
		
	</table>
	<div class="pop">
		<form action="" method="post" class="sets">
			<label for="">数量：</label>
			<input type="button" value="-" class="sub"/>
			<input type="text"  value="0.1" class="count"/>
			<input type="button" name="" id="" value="+" class="add" />
			<br />			
			<input type="button" value="现金"/ id="sure" class="agree"><input type="button" class="agree" name="" id="refuse" value="实物" />
		</form>
	</div>	

</body>
<script type="text/javascript">
$('.set').click(function(e){
	e.stopPropagation();
	$('.pop').css('background','#FFFFFF').show();
	$('body').css("background","rgba(22,22,22,.5)"); 
	var v =1
	$('.add').click(function(e){
		e.stopPropagation();
		v++
		$('.count').val(v/10);
	});
	$('.sub').click(function(e){
		e.stopPropagation();
		if(v == 1){		
		 return $('.count').val(v/10);
		}
		v--
		$('.count').val(v/10);
	});
	$('.agree').click(function(e){
		e.stopPropagation();
	})
	
});
$('body').click(function(){		
		$('.pop').hide();
		$(this).css("background","rgba(22,22,22,0)");
	})
$('.search').click(function(e){
	e.stopPropagation();
	var a = $('.msg').val();
	$('.msg').val(a);
	var t =$('.tel').val();
	$('.tel').val(t);
	$('.msg').focus()
})
</script>

</html>