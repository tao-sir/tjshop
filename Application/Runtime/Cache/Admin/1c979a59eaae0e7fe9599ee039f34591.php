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
<div class="meg">
	<form action="<?php echo U('Fund/fundSel');?>" method="post">
		<table border="0" cellspacing="0" cellpadding="10" id="table3" class="table">
			<tr>
				<td>电话：</td><td class="td-tel">
				<input type="text" name="tel"  class="tel3 tel" value="<?php if($form3tel != null): echo ($form3tel); endif; ?>" />
			</td>
				<td>所属机构：</td>
				<td><input type="text" name="keyword" class="msg2 msg" id="" value="<?php if($form3keyword != null): echo ($form3keyword); endif; ?>" /></td>
				<td>申请转账日期：<input type="date " /></td>
				<td>出现转账日期：<input type="date" /></td>
				<td class="color-l"><input type="submit" value="查询" class="search3" /></td></tr>
		</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table33" class="table" >
		<tr><th>序号</th><th>电话</th><th>所属机构</th><th>收款账号</th><th>收款金额</th><th>申请时间</th><th>处理时间</th><th>流水号</th><th>状态</th></tr>
		<?php if(is_array($form3data)): foreach($form3data as $k=>$v): ?><tr>
				<td><?php echo ($k+1); ?></td>
				<td><?php echo ($v["usercode"]); ?></td>
				<td><?php echo ($v["compname"]); ?></td>
				<td><?php echo ($v["account"]); ?></td>
				<td><?php echo ($v["money"]); ?></td>
				<td><?php echo ($v["ts"]); ?></td>
				<td>2017-06-09</td>
				<td>13213213</td>

					<?php if($v['status'] == 1): ?><td class="color-g" bgcolor='#00b359' style="color:#fff;">成功</td>
						<?php else: ?>
						<td class="color-g" bgcolor='#ff3333' style="color:#fff;">失败</td><?php endif; ?>

			</tr><?php endforeach; endif; ?>
	</table>
</div>
	
	
	
	
	
	
	

</body>
<script type="text/javascript">
	$('.nav>li').click(function(){
		tabs(this);
	$('.table').show();
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