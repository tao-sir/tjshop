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
<div class="">
	<form action="<?php echo U('Fund/fundquery');?>" method="post">
		<table border="0" cellspacing="0" cellpadding="10" id="table1" class="table">
			<tr>
				<td>电话：</td>
				<td><input type="text" name="tel"  class="tel1 tel" id="" value="<?php if($form1tel != null): echo ($form1tel); endif; ?>" /></td>
				<td>所属机构：</td>
				<td><input type="text" name="keyword" class="msg1 msg" id="" value="<?php if($form1keyword != null): echo ($form1keyword); endif; ?>" /></td>
				<td class="color-l"><input type="submit" value="查询" class="search1"/></td>
			</tr>
		</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table11" class="table" >
		<tr><th>序号</th><th>电话</th><th>所属机构</th><th>可用余额</th><th>商城余额</th><th>冻结余额</th></tr>
		<?php if(is_array($form1data)): foreach($form1data as $k=>$v): ?><tr>
				<td><?php echo ($k+1); ?></td>
				<td><?php echo ($v["usercode"]); ?></td>
				<td><?php echo ($v["compname"]); ?></td>
				<td><?php echo ($v["balance"]); ?></td>
				<td><?php echo ($v["shopbalance"]); ?></td>
				<td><?php echo ($v["freezebalance"]); ?></td>
			</tr><?php endforeach; endif; ?>
	</table>
</div>
</body>
<script type="text/javascript">
	
$('.search2').click(function(e){
	e.stopPropagation();
	var a = $('.msg2').val();
	$('.msg2').val(a);
	var t =$('.tel2').val();
	$('.tel2').val(t);
	$('.msg2').focus();
	$(this).parents().find('.table').hide();
	$(this).parents().find('#table2').show();
	$(this).parents().find('#table22').show();
})
$('.search1').click(function(e){
	e.stopPropagation();
	var a = $('.msg1').val();
	$('.msg1').val(a);
	var t =$('.tel1').val();
	$('.tel1').val(t);
	$('.msg1').focus();
	$(this).parents().find('.table').hide();
	$(this).parents().find('#table1').show();
	$(this).parents().find('#table11').show();
})
$('.search3').click(function(e){
	e.stopPropagation();
	var a = $('.msg3').val();
	$('.msg3').val(a);
	var t =$('.tel3').val();
	$('.tel3').val(t);
	$('.msg3').focus();
	$(this).parents().find('.table').hide();
	$(this).parents().find('#table3').show();
	$(this).parents().find('#table33').show();
	
})
</script>

</html>