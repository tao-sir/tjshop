<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>personmsg.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>inventory.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <style type="text/css">
    	
    </style>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		交割查询
	</div>
	<ul class="menu">
		<li class="list"> <span class="in-text">日精</span> <img src="<?php echo C('IMG_URL');?>right.png" width="20"/></li>
		<div class="mains">
			<ul class="li-main">
				<li>交割价格：<span class="color-b">330000</span></li>
				<li>交割时间：<span class="color-b">2017-05-23</span></li>
				<li>交割量：<span class="color-b">3</span></li>
				<li>类别：<span class="color-b">实物/现金</span></li>
				<li>状态：<span class="color-b">审核中/已成交</span></li>
							
			</ul>
		</div>
		<li class="list"><span class="in-text">月华</span><img src="<?php echo C('IMG_URL');?>right.png" width="20"/></li>
		<div class="mains">
			<ul class="li-main">
				<li>交割价格：<span class="color-b">330000</span></li>
				<li>交割时间：<span class="color-b">2017-05-23</span></li>
				<li>交割量：<span class="color-b">3</span></li>
				<li>类别：<span class="color-b">实物/现金</span></li>
				<li>状态：<span class="color-b">审核中/已成交</span></li>
							
			</ul>
		</div>
		<li class="list"><span class="in-text">坤宝</span><img src="<?php echo C('IMG_URL');?>right.png" width="20"/></li>
		<div class="mains">
			<ul class="li-main">
				<li>交割价格：<span class="color-b">330000</span></li>
				<li>交割时间：<span class="color-b">2017-05-23</span></li>
				<li>交割量：<span class="color-b">3</span></li>
				<li>类别：<span class="color-b">实物/现金</span></li>
				<li>状态：<span class="color-b">审核中/已成交</span></li>
							
			</ul>
		</div>
		
		
	</ul>
	<script type="text/javascript">
		$('.list').click(function(){		
		    $(this).children('img').attr('src','<?php echo C('IMG_URL');?>up.png')	
		    $(this).siblings('.list').children('img').attr('src','<?php echo C('IMG_URL');?>right.png')	
			$(this).next(".mains").slideToggle(300).siblings(".mains").slideUp(300);
		});
		
		
		
		var v =$(".mes").val()*10
		$('.add').click(function(){	
			v++
			var m =v/10
			$(this).siblings('.mes').val(m)
		})
		$('.min').click(function(){
			if(v == 0){
				return  $(this).siblings('.mes').val(0)
				console.log(123)
			}
			v--
			var n = v/10		
			$(this).siblings('.mes').val(n)
		})
	</script>
</body>
</html>