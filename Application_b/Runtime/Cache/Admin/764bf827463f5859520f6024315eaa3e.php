<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>base.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>table.css"/>
    <script src="<?php echo C('Admin_JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <title></title>   
</head>
<body>
	<form action="" method="post">					
	<table border="0" cellspacing="0" cellpadding="10" id="table1">		
		<tr><td>电话：</td><td><input type="text" name="" id="" class="tel" value="" /></td><td>所属机构：</td><td><input type="tel" class="msg" name="" id="" value="" /></td><td>从：<input type="date" /></td><td>至：<input type="date" /></td>
			<td class="color-l"><input type="submit" value="查询" class="search"/></td></tr>
	</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table2" >	
		<tr><th>序号</th><th>电话</th><th>品种</th><th>所属机构</th><th>交割成交总量</th><th>发行单价</th><th>交割单价</th><th>交割方式</th></tr>
		<tr><td>1</td><td>13503816234</td><td>日精</td><td>河南科技</td><td>500</td>
			<td>151</td><td>500</td><td class="color-g">现金</td><!--<td class="color-l set">审核</td>-->
		</tr>
		
	</table>
	<!--<div class="pop">
		
	</div>	-->
	<div class="footer">
		导出文档word
	</div>
</body>
<script type="text/javascript">
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