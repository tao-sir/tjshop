<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html data-width="750">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=0">
     <script src="<?php echo C('JS_URL');?>rem.js"></script>
     <script src="<?php echo C('JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <title>天机电商</title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>style.css">
  
</head>
<body>
    <div class="s2-top">
        <div class="s2-back">
            <a href="shop2.html">
            <img src="<?php echo C('IMGS_URL');?>back.png" alt="">
            </a>
        </div>
        <img src="<?php echo C('IMGS_URL');?>s2.png" alt="" >
    </div>
    <div class="s3-section">
        <p>妈妈的碾坊礼盒(有机米)</p>
        <p>￥ 100</p>
        <p>产地：原阳</p>
    </div>
    <div class="line"></div>
    <div class="s3-count clear">
        <span class="s3-text">购买数量</span>
        <p class="s3-btn">
             <input type="button" value="-" class="s3-del"> <span>1</span> <input type="button" value="+" class="add">
        </p>
    </div>
    <div class="s3-shop">
        <span class="getshop">立即购买</span>
        <span class="addshop">加入购物车</span>
    </div>
    <div class="line"></div>
    <div class="s3-footer">
        <img src="<?php echo C('IMGS_URL');?>xiangxi1.jpg" width="100%" alt="">
    </div>
    <script src="<?php echo C('JS_URL');?>add-del.js"></script>
</body>
</html>