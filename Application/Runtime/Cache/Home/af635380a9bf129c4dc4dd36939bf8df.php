<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>personmsg.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <style type="text/css">
    	.msg li input{height: 40px;line-height: 40px;color: #222222;}
    </style>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="address.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		添加收货地址
	</div>
	<ul class="msg">
		<li>省 <input type="text" name="" id="" value="" /></li>
		<li>市 <input type="text" name="" id="" value="" /></li>		
		<li>县/区  <input type="text" name="" id="" value="" /></li>
		<li>详细地址  <input type="text" name="" id="" value="" /></li>
		<li>县收货人 <input type="text" name="" id="" value="" /></li>
		<li>联系方式<input type="text" name="" id="" value="" /></li>				
		<li class="editor">确定添加</li>
	</ul>
</body>
</html>