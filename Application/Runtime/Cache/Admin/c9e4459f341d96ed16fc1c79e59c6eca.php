<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>base.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>table.css"/>
    <link rel="stylesheet" href="<?php echo C('Admin_CSS_URL');?>zijin.css" />
 	<style type="text/css">
 		.active a{color: #FFFFFF}
 	</style>
    <script src="<?php echo C('Admin_JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <title></title>
</head>
<body>
	<ul class="nav clear">
		<li class="active"><a href="zijin1.html" target="mes">资金查询</a></li>
		<li><a href="zijin2.html" target="mes">入金查询</a></li>
		<li><a href="zijin3.html" target="mes">出金查询</a></li>		
	</ul>
	<iframe width="100%" height="500" name="mes" src="zijin1.html" frameborder="0" scrolling="auto" class="right">
   		</iframe>
	</body>
<script type="text/javascript">
	$('.nav>li').click(function(){
	$(this).siblings().removeClass('active');
	$(this).addClass('active')
	})
</script>
</html>