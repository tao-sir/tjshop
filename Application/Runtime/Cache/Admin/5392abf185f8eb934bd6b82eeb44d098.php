<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>base.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>table.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>delegation.css"/>
    <script src="<?php echo C('Admin_JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <title></title>
   
</head>
<body>
	<form action="<?php echo U('Index/subscriptionAll');?>" method="post">
	<table border="0" cellspacing="0" cellpadding="10" id="table1">		
		<tr>
			<td>电话：</td>
			<td><input type="text" name="tel" class="tel" id="" value="<?php if($tel != null): echo ($tel); endif; ?>" /></td>
			<td>所属机构：</td>
			<td><input type="tel" name="keyword" id="" class="msg" value="<?php if($keyword != null): echo ($keyword); endif; ?>" /></td>
			<td>从：<input type="date" name="starttime" value="<?php if($starttime != null): echo ($starttime); endif; ?>"/></td>
			<td>至：<input type="date" name="endtime" value="<?php if($endtime != null): echo ($endtime); endif; ?>"/></td>
			<td class="color-l"><input type="submit" value="查询" class="search"/></td>
		</tr>
	</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table2" >	
		<tr><th>序号</th><th>电话</th><th>品种</th><th>单价</th><th>所属机构</th><th>通过总量</th><th>通过总额</th></tr>
		<?php if(is_array($data)): foreach($data as $k=>$v): ?><tr>
				<!--<td>1</td><td>13503816234</td><td>日精</td><td>2000</td><td>河南科技</td>-->
				<!--<td>500</td><td>2000</td>&lt;!&ndash;<td class="color-l set">审核</td>&ndash;&gt;-->
				<td><?php echo ($k+1); ?></td><td><?php echo ($v["usercode"]); ?></td><td><?php echo ($v["productname"]); ?></td><td><?php echo ($v["openprice"]); ?></td><td><?php echo ($v["compname"]); ?></td>
				<td><?php echo ($v["num"]); ?></td><td><?php echo ($v["summny"]); ?></td><!--<td class="color-l set">审核</td>-->
			</tr><?php endforeach; endif; ?>
	</table>
	<div class="pop">
		<form action="" method="post" class="sets">
			<label for="">数量：</label>
			<input type="button" value="-" class="sub"/>
			<input type="text"  value="0.1" class="count"/>
			<input type="button" name="" id="" value="+" class="add" />
			<br />			
			<input type="button" value="同意"/ id="sure" class="agree"><input type="button" class="agree" name="" id="refuse" value="拒绝" />
		</form>
	</div>	
	<div class="footer">
		导出文档word
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