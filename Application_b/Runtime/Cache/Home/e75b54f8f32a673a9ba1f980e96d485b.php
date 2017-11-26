<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>shopcar.css" />
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
   
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		已购买
	</div>
	<ul class="deal-nav clear">
		<li class="nav-left">商品</li>
		<li class="nav-cen">数量</li>
		<li class="nav-cen">价格</li>
		<li class="nav-right">最新物流</li>
	</ul>
	<ul class="deal-mes clear bg">
		<li class="nav-left">黑玉蜂蜜</li>
		<li class="nav-cen">1</li>
		<li class="nav-cen">100</li>
		<li class="nav-right">青州</li>	         
	</ul>
	<ul class="deal-mes clear">
		<li class="nav-left">黑玉蜂蜜</li>
		<li class="nav-cen">1</li>
		<li class="nav-cen">100</li>
		<li class="nav-right">已收货</li>	         
	</ul>
	<ul class="deal-mes clear bg">
		<li class="nav-left">黑玉蜂蜜</li>
		<li class="nav-cen">1</li>
		<li class="nav-cen">100</li>
		<li class="nav-right">青州</li>	         
	</ul>
	
	<div class="homelink">
		<a href="purchase.html"><button>预购</button></a>
		<a href="purchase2.html"><button>预售</button></a>
	
	</div>
	<ul class="footer">
			<li class="item"><a href="index.html"><img src="<?php echo C('IMG_URL');?>a1.png"><p>首页</p></a></li>
			<li class="item"><a href="subscribe.html"><img src="<?php echo C('IMG_URL');?>a2.png"><p>认购/转让</p></a></li>
			<li class="item"><a href="shop2.html"><img src="<?php echo C('IMG_URL');?>a3.png"><p>商城</p></a></li>
			<li class="item"><a href="notice.html"><img src="<?php echo C('IMG_URL');?>a4.png"><p>公告</p></a></li>
			<li class="item"><a href="person.html"><img src="<?php echo C('IMG_URL');?>b5.png"><p class="f-active">个人</p></a></li>
		</ul>
</body>
</html>