<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>subscribe.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    
    <style type="text/css">
    	.popup2{}
    </style>
</head>
<body>
	<div id="app">
		<div class="top">
			<p>坤宝</p>
		     <img src="<?php echo C('IMG_URL');?>arrow.png" class="arrow">		
			<ul class="subnav">
				<!--<li><a href="javascript:;">日精</a></li>
				<li><a href="yuehua.html">月华</a></li>-->
				<li><a href="kunbao.html">坤宝</a></li>
				
			</ul>
		</div>
		<!--<div class="main clear">

			<div class="main-left">
				<p>最新</p>
				<p>25698</p>
			</div>
			<ul class="main-center">
				<li>开盘价：<span class="color-r">350000</span></li>
				<li>收盘价：<span class="color-r">100000</span></li>
			</ul>
			<ul class="main-right">
				<li>最高：<span class="color-r">350000</span></li>
				<li>最低：<span class="color-r">100000</span></li>
			</ul>
		</div>-->
		<div class="buy">
			<div class="buy-icon">买单</div>
			<ul class="buy-title clear">
				<li>交易物</li>
				<li>价格</li>
				<li>数量</li>
				<li>操作</li>
			</ul>
			<!--<ul class="buy-mes clear">
				<li>日精</li>
				<li>123000</li>
				<li>500</li>
				<li class="showon"><a href="<?php echo U('Public/tishi');?>">购入</a></li>
			</ul>
			<ul class="buy-mes clear" style="background: #FFFFFF;">
				<li>月华</li>
				<li>35000</li>
				<li>500</li>
				<li class="showon"><a href="<?php echo U('Public/tishi');?>">购入</a></li>
			</ul>
			<ul class="buy-mes clear">
				<li>坤宝</li>
				<li>15000</li>
				<li>500</li>
				<li class="showon"><a href="<?php echo U('Public/tishi');?>">购入</a></li>
			</ul>-->
		</div>
		<div class="buy">
			<div class="buy-icon">卖单</div>
			<ul class="buy-title clear">
				<li>交易物</li>
				<li>价格</li>
				<li>数量</li>
				<li>操作</li>
			</ul>
			<!--<ul class="buy-mes clear">
				<li>日精</li>
				<li>260000</li>
				<li>2</li>
				<li class="showon"><a href="<?php echo U('Public/tishi');?>">卖出</a></li>
			</ul>
			<ul class="buy-mes clear" style="background: #FFFFFF;">
				<li>月华</li>
				<li>140000</li>
				<li>4</li>
				<li class="showon"><a href="<?php echo U('Public/tishi');?>">卖出</a></li>
			</ul>
			<ul class="buy-mes clear">
				<li>坤宝</li>
				<li>45000</li>
				<li>3</li>
				<li class="showon"><a href="<?php echo U('Public/tishi');?>">卖出</a></li>
				
			</ul>
			<ul class="buy-mes clear">
				<li>日精</li>
				<li>135000</li>
				<li>9</li>
				<li class="showon"><a href="<?php echo U('Public/tishi');?>">卖出</a></li>			
			</ul>-->
		</div>
		<ul class="homelink">
			<a href="<?php echo U('Public/tishi');?>"><li class="home1">预购</li></a>
			<a href="<?php echo U('Public/tishi');?>"><li class="home2">预售</li></a>
		</ul>
		
		<div class="popup">
			<p>名称：
			    <select name="jumpMenu2" id="jumpMenu2" ">
			      <option value="javascript;:">日精</option>
			      <option value="http://www.baidu.com">月华</option>
			      <option value="">坤宝</option>
			    </select>
		  </p>

			<p>价格：<input type="text" /></p>
			<p>数量：<input type="text" /></p>
			<input type="button" value="确定"/ id="sure">
		</div>
		
		<div class="popup2">				
			<p>数量：<input type="button" value="-" id="sub"/><input type="text" id="count" value="1" />
				<input type="button" value="+" id="add"/>												
			</p>
			<input type="button" value="确定"/ id="sure2">
		</div>
		<div class="all" >
			
		</div>
		<div style="width: 100%;height: 140px;">
			
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
	
	<script type="text/javascript">
 		$('.arrow').click(function(){
 			$('.subnav').toggle();
 		});
 		$('.home1').click(function(){
 			$('.all').show()
 			$('.popup').show() 	
 		});
 		$('.home2').click(function(){
 			$('.all').show()
 			$('.popup').show() 	
 		});
 		$('#sure').click(function(){
 			$('.all').hide()
 			$('.popup').hide()
 		});
 		$('.showon').click(function(){
 			$('.all').show()
 			$('.popup2').show() 
 		});
 		$('#sure2').click(function(){
 			$('.all').hide()
 			$('.popup2').hide()
 		});
 		var v = $('#count').val();
 		$('#add').click(function(){
 			v++;
 			$('#count').val(v);
 			
 			
 		})
 		$('#sub').click(function(){
 			if(v == 1){
 				return $('#count').val(1);
 			}
 			v--
 			$('#count').val(v);
 		})
 		
 		
 		
 	</script>
</body>
</html>