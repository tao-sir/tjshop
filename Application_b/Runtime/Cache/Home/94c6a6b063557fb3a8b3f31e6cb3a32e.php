<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>recharge.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
   	<style type="text/css">
   		 body{background: #EDEDED;}
   		.r-wrap{width: 100%;background: #EDEDED;}
   		.space{width: 100%;height: 40px;}
   		.main{width: 100%;height: 140px;background:#FFFFFF ;}
   		.main p{padding-top: 10px;padding-left: 15px;}
   		input{color: #222222;}
   		#sum{width: 200px;height: 80px;font-size: 32px;line-height: 80px;text-indent: 15px;}
   		::-webkit-input-placeholder {color: #cccccc;font-size: 32px;}
   		#next{width: 50%;background: #0C86E5;line-height: 30px;color: #FFFFFF;border-radius: 5px;margin-left: 25%;margin-top: 50px;}
   		
   	</style>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>		
		</div>
		充值
	</div>
	<div class="r-wrap">
		<div class="space">
			
		</div>
		<form action="" method="post">	
		<div class="main">												
			<p>请输入交易金额</p>			
			<input type="text" name="" id="sum" value="" placeholder="￥ 0.00" required="required" autofocus="autofocus"/>		
					
		</div>
		<a href="recharge_ts.html"><input type="button" name="next" id="next" value="下一步" /></a>

		<input type="hidden" value=""/>	
		</form>
	</div>
		
	
	
	<script type="text/javascript">
	window.onload = function(){
		$('#sum').focus();
	};
		
		$('#next').click(function(e){			 
			if($('#sum').val() == ""){
			e.preventDefault();
			e.stopPropagation();	
			return	alert('请输入金额')
			
			}
		})
	</script>
</body>
</html>