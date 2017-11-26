<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html data-width="750">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=0">
     <script src="<?php echo C('JS_URL');?>rem.js"></script>
     <script src="<?php echo C('JS_URL');?>jquery.min.js"></script> 
    <title>天机电商</title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>style.css">
</head>
<body>
    <div class="s3-top">
        <div class="back">
            <a href="shop2.html">
            <img src="<?php echo C('IMGS_URL');?>back.png" alt="">
            </a>
        </div>
        <img src="<?php echo C('IMGS_URL');?>s4.jpg" width="100%" alt="">
    </div>
    <div class="s3-section">
        <p>格兰菲迪 (Glenfiddich)</p>
        <p>￥ 20000</p>
        <p>产地：苏格兰高斯佩赛</p>
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
        <img src="<?php echo C('IMGS_URL');?>xiangxi4.jpg" width="100%" alt="">
    </div>
    <script src="<?php echo C('JS_URL');?>add-del.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>