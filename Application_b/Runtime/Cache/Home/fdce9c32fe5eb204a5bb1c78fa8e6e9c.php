<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>recharge.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
   	<style type="text/css">
   		 body{background: #EDEDED;}
   		 .msg{}
   		.msg li{width: 90%;margin-left: 5%;height: 80px;background: #FFFFFF;border-radius: 5px;margin-top:10px ;}
   		.left-img{margin-top: 20px;margin-left: 20px;}
   		.z-text{line-height: 80px;margin-left: 20px;}
  
   		.right-img{margin-top: 25px;margin-left: 100px;}
   	</style>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="recharge_t.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>		
		</div>
		选择支付类型
	</div>
	<ul class="msg">
		
	<a href="">
	<li><img src="<?php echo C('IMG_URL');?>zhifubao.png" width="40" / class="left-img"> <span class="z-text">支付宝支付</span><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30" class="right-img" />
	</li></a>
	<a href="">
	<li><img src="<?php echo C('IMG_URL');?>weixin.png" width="40" / class="left-img"> <span class="z-text weixin">微信支付     </span><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30" class="right-img" style="margin-left: 110px;"/>
	</li></a>
	<a href="recharge.html">
	<li><img src="<?php echo C('IMG_URL');?>yinlian.png" width="40" / class="left-img"> <span class="z-text">银行卡支付</span><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30" class="right-img" />
	</li></a>
	</ul>
	
		
		
	
	
</body>
</html>