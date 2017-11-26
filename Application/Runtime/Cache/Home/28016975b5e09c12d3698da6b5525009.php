<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html data-width="750">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=0">

    <script src="<?php echo C('JS_URL');?>rem.js"></script>
    <title>天机电商</title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>style.css">
    	
</head>
<body>
<div class="top">
    <div class="header">
        <div class="logo">
            <img src="<?php echo C('IMGS_URL');?>logo.png" width="100%" alt="">
        </div>
        <a href="shopcar.html"><img src="<?php echo C('IMGS_URL');?>shop.png" alt="" width="32" class="shop"></a>
    </div>
    <div class="banner">
        <img src="<?php echo C('IMGS_URL');?>bg_02_03.jpg" width="100%" alt="">
    </div>
</div>
<section class="clear">
    <div class="left">
        <a href="s1.html">
            <div class="i-left">
              <img src="<?php echo C('IMGS_URL');?>s1.png" width="100%" alt="" class="s1">
            </div>
        </a>
        <p class="main">黑雪蜂蜜</p>
        <p>￥ 56</p>
    </div>
    <div class="right">
        <a href="s2.html">
           <div class="i-right">
               <img src="<?php echo C('IMGS_URL');?>s2.png" width="100%" alt="">
           </div>
        </a>
        <p class="main2">妈妈的碾坊礼盒(有机米)</p>
        <p class="main3">￥ 100</p>
    </div>
    </section>
    <ul class="footer-mes">
        <li><a href="s3.html"><img src="<?php echo C('IMGS_URL');?>s3.jpg" width="100%" alt=""></a></li>
        <li><a href="s4.html"><img src="<?php echo C('IMGS_URL');?>s4.jpg" width="100%" alt=""></a></li>
    </ul>
<ul class="footer">
    <li class="item">
        <a href="/tjshop/index.php/Home/Index/index/active/1.html">
            <?php if($active == 1): ?><img src="<?php echo C('IMG_URL');?>b1.png">
                <p class="f-active">首页</p>
                <?php else: ?>
                <img src="<?php echo C('IMG_URL');?>a1.png">
                <p>首页</p><?php endif; ?>
        </a>
    </li>
    <li class="item">
        <a href="/tjshop/index.php/Home/Index/subscribe/active/2.html">
            <?php if($active == 2): ?><img src="<?php echo C('IMG_URL');?>b2.png">
                <p class="f-active">预购/预售</p>
                <?php else: ?>
                <img src="<?php echo C('IMG_URL');?>a2.png">
                <p>预购/预售</p><?php endif; ?>
        </a>
    </li>
    <li class="item">
        <a href="/tjshop/index.php/Home/Index/shop2/active/3.html">
            <?php if($active == 3): ?><img src="<?php echo C('IMG_URL');?>b3.png">
                <p class="f-active">商城</p>
                <?php else: ?>
                <img src="<?php echo C('IMG_URL');?>a3.png">
                <p>商城</p><?php endif; ?>
        </a>
    </li>
    <li class="item">
        <a href="/tjshop/index.php/Home/Notice/noticeList/active/4.html">
            <?php if($active == 4): ?><img src="<?php echo C('IMG_URL');?>b4.png">
                <p class="f-active">公告</p>
                <?php else: ?>
                <img src="<?php echo C('IMG_URL');?>a4.png">
                <p>公告</p><?php endif; ?>
        </a>
    </li>
    <li class="item">
        <a href="/tjshop/index.php/Home/Index/person/active/5.html">
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