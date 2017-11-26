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
	<style>

	</style>
</head>
<body>
<div class="meg">
	<form action="<?php echo U('Fund/enterFund');?>" method="post">
		<table border="0" cellspacing="0" cellpadding="10" id="table2" class="table">
			<tr>
				<td>电话：</td>
				<td><input type="text" name="tel" class="tel2 tel" id="" value="<?php if($form2tel != null): echo ($form2tel); endif; ?>" /></td>
				<td>所属机构：</td>
				<td><input type="text" name="keyword" id="" class="msg" value="<?php if($form2keyword != null): echo ($form2keyword); endif; ?>" class="msg2"/></td>
				<td>申请转账日期：<input type="date" /></td>
				<td>出现转账日期：<input type="date" /></td>
				<td class="color-l"><input type="submit" value="查询" class="search2"/></td>
			</tr>

		</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table22" class="table">
		<tr>
			<th>序号</th>
			<th>电话</th>
			<th>所属机构</th>
			<th>转账类型</th>
			<th>转账金额</th>
			<th>申请时间</th>
			<th>处理时间</th>
			<th>流水号</th>
			<th>状态</th>
		</tr>

		<?php if(is_array($form2data)): foreach($form2data as $k=>$v): ?><tr>
				<th><?php echo ($k+1); ?></th>
				<th><?php echo ($v["usercode"]); ?></th>
				<th><?php echo ($v["compname"]); ?></th>
				<th><?php echo ($v["topuptype"]); ?></th>
				<th><?php echo ($v["money"]); ?></th>
				<th><?php echo ($v["ts"]); ?></th>
				<!--<th>处理时间</th>-->
				<!--<th>流水号</th>-->
				<!--<th>状态</th>-->
			</tr><?php endforeach; endif; ?>

	</table>
</div>
</body>
<script type="text/javascript">

</script>

</html>