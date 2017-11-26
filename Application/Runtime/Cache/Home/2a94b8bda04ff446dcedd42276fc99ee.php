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
				<!--<a href="<?php echo U('Index/rijing');?>">-->
				<a href="<?php echo U('Public/tishi');?>">
					<div class="mes-left"><?php echo ($data[0]["productname"]); ?></div>
					<ul class="rijing clear">
						<li><?php echo ($data[0]["openprice"]); ?></li>
						<li class="color-r">---<!--<?php echo ($data[0]["currentprice"]); ?>--></li>
						<li class="color-r"><?php echo ($rose1); ?>%</li>
						<li class="color-b">---<!--<?php echo ($data[0]["closeprice"]); ?>--></li>
					</ul>
				</a>	
			</div>
			<!--<div class="mes clear" style="background: none;">-->
				<!--<a href="<?php echo U('Index/yuehua');?>">-->
				<!--<a href="<?php echo U('Public/tishi');?>">
					<div class="mes-left"><?php echo ($data[1]["productname"]); ?></div>
					<ul class="rijing clear">
						<li><?php echo ($data[1]["openprice"]); ?></li>
						<li class="color-r"><?php echo ($data[1]["currentprice"]); ?></li>
						<li class="color-r"><?php echo ($rose2); ?>%</li>
						<li class="color-b"><?php echo ($data[1]["closeprice"]); ?></li>
					</ul>
				</a>	
			</div>
			<div class="mes clear">-->
				<!--<a href="<?php echo U('Index/kunbao');?>">-->
				<!--<a href="<?php echo U('Public/tishi');?>">
					<div class="mes-left"><?php echo ($data[2]["productname"]); ?></div>
					<ul class="rijing clear">
						<li><?php echo ($data[2]["openprice"]); ?></li>
						<li class="color-r"><?php echo ($data[2]["currentprice"]); ?></li>
						<li class="color-r"><?php echo ($rose3); ?>%</li>
						<li class="color-b"><?php echo ($data[2]["closeprice"]); ?></li>
					</ul>
				</a>	
			</div>-->
		</div>
		<ul class="footer">
    <li class="item">
        <a href="/index.php/Home/Index/index/active/1.html">
            <?php if($active == 1): ?><img src="<?php echo C('IMG_URL');?>b1.png">
                <p class="f-active">首页</p>
                <?php else: ?>
                <img src="<?php echo C('IMG_URL');?>a1.png">
                <p>首页</p><?php endif; ?>
        </a>
    </li>
    <li class="item">
        <a href="/index.php/Home/Index/subscribe/active/2.html"">
            <?php if($active == 2): ?><img src="<?php echo C('IMG_URL');?>b2.png">
                <p class="f-active">预购/预售</p>
                <?php else: ?>
                <img src="<?php echo C('IMG_URL');?>a2.png">
                <p>预购/预售</p><?php endif; ?>
        </a>
    </li>
    <li class="item">
        <a href="/index.php/Home/Goods/goodsList">
            <?php if($controller === Goods): ?><img src="<?php echo C('IMG_URL');?>b3.png">
                <p class="f-active">商城</p>
                <?php else: ?>
                <img src="<?php echo C('IMG_URL');?>a3.png">
                <p>商城</p><?php endif; ?>
        </a>
    </li>
    <li class="item">
        <a href="/index.php/Home/Notice/noticeList">
            <?php if($controller == Notice): ?><img src="<?php echo C('IMG_URL');?>b4.png">
                <p class="f-active">公告</p>
                <?php else: ?>
                <img src="<?php echo C('IMG_URL');?>a4.png">
                <p>公告</p><?php endif; ?>
        </a>
    </li>
    <li class="item">
        <a href="/index.php/Home/Index/person/active/5.html">
            <?php if($active == 5): ?><img src="<?php echo C('IMG_URL');?>b5.png">
                <p class="f-active">个人</p>
                <?php else: ?>
                <img src="<?php echo C('IMG_URL');?>a5.png">
                <p>个人</p><?php endif; ?>
        </a>
    </li>
</ul>
	</div>
</body>
</html>