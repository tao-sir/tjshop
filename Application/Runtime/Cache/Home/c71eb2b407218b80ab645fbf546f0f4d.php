<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>subscribe.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>rijing.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
 	
    <style type="text/css">
  		
  		
  		
    </style>
</head>
<body>
	<div id="app">
		<div class="top">
			<p>坤宝</p>
		     <img src="<?php echo C('IMG_URL');?>arrow.png" class="arrow">		
			<ul class="subnav">
				<li><a href="rijing.html">日精</a></li>
				<li><a href="yuehua.html">月华</a></li>
				<li><a href="javascript:;">坤宝</a></li>
				
			</ul>
		</div>
		<div class="main clear">

			<div class="main-left">
				<p>最新</p>
				<p><?php echo ($pro["currentprice"]); ?></p>
			</div>
			<ul class="main-center">
				<li>开盘价：<span class="color-r"><?php echo ($pro["openprice"]); ?></span></li>
				<li>收盘价：<span class="color-r"><?php echo ($pro["closeprice"]); ?></span></li>
			</ul>
			<ul class="main-right">
				<li>最高：<span class="color-r"><?php echo ($pro["maxprice"]); ?></span></li>
				<li>最低：<span class="color-r"><?php echo ($pro["minprice"]); ?></span></li>
			</ul>
		</div>
		<ul class="r-mes">
			<li class="tabhover">1m</li>
			<li class="taba">5m</li>
			<li class="taba">30m</li>
			<li class="taba">1h</li>
			<li class="taba">1日</li>
			<li class="taba">1周</li>
		</ul>
		<div class="tabcontent">
				<img src="<?php echo C('IMG_URL');?>hotts.png" width="100%" alt="" />
				</div>
				<div class="tabcontent" style="DISPLAY: none">
				选择内容2
				</div>
				<div class="tabcontent" style="DISPLAY: none">
				选择内容3
				</div>
				<div class="tabcontent" style="DISPLAY: none">
				选择内容4
				</div>
				<div class="tabcontent" style="DISPLAY: none">
				选择内容5
		</div>
		<div class="buy-in">
			<span>现价买入</span>
		</div>
		<div class="buy-main">
			<p>规格：<span class="line"><input type="button" value="-" class="min"><input type="text" name="" id="" value="1" class="mes"/><input type="button" class="add" value="+" /> </span> <span class="pay">买入</span></p>
		</div>
		<div class="buy-in">
			<span>现价卖出</span>
		</div>
		<div class="buy-main">
			<p>规格：<span class="line"><input type="button" value="-" class="min"><input type="text" name="" class="mes" value="1" /><input type="button" class="add" value="+" /> </span> <span class="pay">卖出</span></p>
		</div>
		<div style="width: 100%;height: 100px;">
			
		</div>
		<ul class="footer">
			<li class="item"><a href="index.html"><img src="<?php echo C('IMG_URL');?>b1.png"><p class="f-active">首页</p></a></li>
			<li class="item"><a href="subscribe.html"><img src="<?php echo C('IMG_URL');?>a2.png"><p>预购/预售</p></a></li>
			<li class="item"><a href="shop2.html"><img src="<?php echo C('IMG_URL');?>a3.png"><p>商城</p></a></li>
			<li class="item"><a href="notice.html"><img src="<?php echo C('IMG_URL');?>a4.png"><p>公告</p></a></li>
			<li class="item"><a href="person.html"><img src="<?php echo C('IMG_URL');?>a5.png"><p>个人</p></a></li>
		</ul>
	</div>
	<script type="text/javascript">
 		$('.arrow').click(function(){
 			$('.subnav').toggle();
 		})
 	</script>
 	<SCRIPT language=javascript type=text/javascript>
		$(document).ready(function () {
		$('.r-mes li').click(function () {
		var index = $(this).index();
		$(this).attr('class',"tabhover").siblings('li').attr('class','taba');
		$('.tabcontent').eq(index).show(0).siblings('.tabcontent').hide();
		});
		var v =$(".mes").val();
		$('.add').click(function(){	
			v++
			var m =v
			$(this).siblings('.mes').val(m)
		})
		$('.min').click(function(){
			if(v == 0){
				return  $(this).siblings('.mes').val(0)
				console.log(123)
			}
			v--
			var n = v
			
			$(this).siblings('.mes').val(n)
		})
		

})
</SCRIPT>
</body>
</html>