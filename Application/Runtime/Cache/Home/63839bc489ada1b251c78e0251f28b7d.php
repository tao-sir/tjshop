<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>base.css"/>
    <script src="<?php echo C('JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <title></title>
    <style type="text/css">
    	header{position: relative;}
    	.top{position: absolute;top: 0;left: 0;background: rgba(0,0,0,.2);width: 100%;height: 50px;text-align: center; }
    	.logo{}
    	.shop{position: absolute;top: 5px;right: 25px;}
    	.nav{width: 100%;padding: 25px 0;}
    	.nav>li{width: 25%;float: left;text-align: center;}
    	.newSection{width: 98%;margin: 0 auto;}
    	.newSection>li{width:49%;text-align: center;margin-top:10px;}
    	.newSection>li:nth-of-type(odd){float: right;}
    	.newSection>li:nth-of-type(even){float: left;}
    	.newSection>li p{padding: 3px 0;}
    	.newSection>li p:nth-of-type(1){margin-top: 10px;}
    	.col-blue{color: #6bc6f8;font-size: 18px;}    	   	
    </style>

</head>
<body>
	<header>
		<div class="top">
			<img src="<?php echo C('IMGS_URL');?>logo.png" width="110" class="logo">
			<img src="<?php echo C('IMGS_URL');?>shop.png" width="32" alt="" class="shop">
		</div>
		<img src="<?php echo C('IMGS_URL');?>banner.png" width="100%"/>
	</header>
	<ul class="nav clear">
			<li>
			<img src="<?php echo C('IMGS_URL');?>nav1.png" width="100%">
			<p>大米</p>
			</li>
		<li>
			<img src="<?php echo C('IMGS_URL');?>nav2.png" width="100%">
			<p>白酒</p>
		</li><li>
			<img src="<?php echo C('IMGS_URL');?>nav3.png" width="100%">
			<p>矿泉水</p>
		</li><li>
			<img src="<?php echo C('IMGS_URL');?>nav4.png" width="100%">
			<p>红酒</p>
		</li>		
	</ul>
	<ul class="newSection">
		<li>
			<a href=""><img src="<?php echo C('IMGS_URL');?>newSection2.png" width="100%">
			<p>酱香原酒</p>
			<p class="col-blue">￥299.0元</p></a>
		</li>
		<li>
			<a href=""><img src="<?php echo C('IMGS_URL');?>newSection1.png" width="100%">
				<p>元阳原生·天然有机大米</p>
				<p class="col-blue">￥169.0元</p></a>
		</li>
		<li>
			<a href=""><img src="<?php echo C('IMGS_URL');?>newSection4.png" width="100%">
			<p>干红红酒</p>
			<p class="col-blue">￥500元</p></a>
		</li>
		<li>
			<a href=""><img src="<?php echo C('IMGS_URL');?>newSection3.png" width="100%">
			<p>天机山泉矿物质水</p>
			<p class="col-blue">￥2.0元</p></a>
		</li>
	</ul>
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
</body>
</html>