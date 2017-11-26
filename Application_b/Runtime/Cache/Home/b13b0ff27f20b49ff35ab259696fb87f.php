<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>recharge.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		银行卡管理
	</div>
	<div class="card-wrap">
		<div class="addcard clear">
			<a href="addcard.html">
				<div class="card" style="width: 90%;">
				添加银行卡
			</div>
			</a>
			
		</div>
		<ul class="card-gem">
			<li>工商银行  6217**********1254 <span class="del color-r" style="float: right;"> 删除</span></li>
			<li>工商银行  6217**********1254 <span class="del color-r" style="float: right;"> 删除</span></li>
			<li>工商银行  6217**********1254 <span class="del color-r" style="float: right;"> 删除</span></li>
		</ul>
		
	</div>
	
</body>
<script type="text/javascript">
	$('.del').click(function(){
		$(this).parent().remove();
		
		var len =$('.card-gem li').length
		console.log(len)
		if(len == 0){
			alert('请添加银行卡')
		}
	
	})
</script>
</html>