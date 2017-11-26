<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>purchase.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		<a href="purchase.html"><span  style="margin-right: 10px;color: #FFFFFF;">预购</span></a><a href="purchase2.html"><span class="color-b" style="margin-left: 10px;">预售</span></a>
	</div>
	<ul class="deal-nav clear">
		<li class="nav-left">交易物</li>
		<li class="nav-cen">委托量</li>
		<li class="nav-cen">委托价格</li>
		<li class="nav-cen">操作</li>	
		<li class="nav-right">委托时间</li>
	</ul>
	<ul class="deal-mes clear">
		<li class="nav-left">月华西北第二位</li>
		<li class="nav-cen">500</li>
		<li class="nav-cen">259845</li>
		<li class="nav-cen"><button class="pur-del">撤销</button></li>
		<li class="nav-right">2017 05 22<br />13:56</li>	         
	</ul>
	<ul class="deal-mes clear">
		<li class="nav-left">月华西北第三位</li>
		<li class="nav-cen">500</li>
		<li class="nav-cen">259845</li>
		<li class="nav-cen"><button class="pur-del">撤销</button></li>
		<li class="nav-right">2017 05 22<br />13:56</li>	         
	</ul>
	<ul class="deal-mes clear">
		<li class="nav-left">月华西北第四位</li>
		<li class="nav-cen">500</li>
		<li class="nav-cen">259845</li>
		<li class="nav-cen"><button class="pur-del">撤销</button></li>
		<li class="nav-right">2017 05 22<br />13:56</li>	         
	</ul>
	
	<script type="text/javascript">
	$('.pur-del').click(function(){				
		$(this).parent().parent().remove();
		$(this).remove();
	})
</script>
</body>
</html>