<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>天机电商</title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>index.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
   
  
</head>
<body>
	<div id="app">
		<div class="home">
			<div class="banner">
				<img src="<?php echo C('IMG_URL');?>banner.png" width="100%" alt="" />
			</div>
			<div class="nav-wrap">
				<ul class="nav clear">
				<li>开市价</li>
				<li>最新价</li>
				<li>涨幅</li>
				<li>收盘价</li>
				</ul>
			</div>
			<div class="mes clear">
				<a href="<?php echo C('URL');?>rijing.html">
					<div class="mes-left"><?php echo ($data[0]["productname"]); ?></div>
					<ul class="rijing clear">
						<li><?php echo ($data[0]["openprice"]); ?></li>
						<li class="color-r"><?php echo ($data[0]["currentprice"]); ?></li>
						<li class="color-r"><?php echo ($rose1); ?>%</li>
						<li class="color-b"><?php echo ($data[0]["closeprice"]); ?></li>
					</ul>
				</a>	
			</div>
			<div class="mes clear" style="background: none;">
				<a href="<?php echo C('URL');?>yuehua.html">
					<div class="mes-left"><?php echo ($data[1]["productname"]); ?></div>
					<ul class="rijing clear">
						<li><?php echo ($data[1]["openprice"]); ?></li>
						<li class="color-r"><?php echo ($data[1]["currentprice"]); ?></li>
						<li class="color-r"><?php echo ($rose2); ?>%</li>
						<li class="color-b"><?php echo ($data[1]["closeprice"]); ?></li>
					</ul>
				</a>	
			</div>
			<div class="mes clear">
				<a href="<?php echo C('URL');?>kunbao.html">
					<div class="mes-left"><?php echo ($data[2]["productname"]); ?></div>
					<ul class="rijing clear">
						<li><?php echo ($data[2]["openprice"]); ?></li>
						<li class="color-r"><?php echo ($data[2]["currentprice"]); ?></li>
						<li class="color-r"><?php echo ($rose3); ?>%</li>
						<li class="color-b"><?php echo ($data[2]["closeprice"]); ?></li>
					</ul>
				</a>	
			</div>
		</div>
		<ul class="footer">
			<li class="item"><a href="<?php echo C('URL');?>index.html"><img src="<?php echo C('IMG_URL');?>b1.png"><p class="f-active">首页</p></a></li>
			<li class="item"><a href="<?php echo C('URL');?>subscribe.html"><img src="<?php echo C('IMG_URL');?>a2.png"><p>预购/预售</p></a></li>
			<li class="item"><a href="<?php echo C('URL');?>shop2.html"><img src="<?php echo C('IMG_URL');?>a3.png"><p>商城</p></a></li>
			<li class="item"><a href="<?php echo C('URL');?>notice.html"><img src="<?php echo C('IMG_URL');?>a4.png"><p>公告</p></a></li>
			<li class="item"><a href="<?php echo C('URL');?>person.html"><img src="<?php echo C('IMG_URL');?>a5.png"><p>个人</p></a></li>
		</ul>
	</div>
</body>
</html>