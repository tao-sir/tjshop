<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>天机后台</title>
		<script src="<?php echo C('Admin_JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>base.css"/>
		<link rel="stylesheet" href="<?php echo C('Admin_CSS_URL');?>index.css" />
	</head>
	<body>
		<div class="top clear"> 
			<span class="title title1">天机商城</span>
			<span class="title title2">后台管理系统</span>
			<span class="title title3">登录账号：<span class="number"><?php echo ($_SESSION['admin']['usercode']); ?></span></span>
			<span class="title title4">公司名称: <span class="user"><?php echo ($_SESSION['admin']['compname']); ?></span></span>
			<a href="<?php echo U('Index/logout');?>"><input type="button" name="" id="exit" value="退出" style="cursor: pointer;" /></a>
		<!-- 	<input type="button" name="" id="change" value="修改密码"  /> -->
		</div>
		<ul class="menu clear">
		<li class="list">  <img src="<?php echo C('Admin_IMG_URL');?>1.png" width="20"/><span class="in-text">账号管理</span></li>
		<div class="mains clear">
			<ul class="li-main">
				<li><a href="client.html"  target="main">a 客户管理</a></li>
				<li><a href="zijin.html"  target="main">b 资金管理</a></li>											
			</ul>
		</div>		
		<li class="list"> <img src="<?php echo C('Admin_IMG_URL');?>1.png" width="20"/><span class="in-text">合作单位</span></li>
		<div class="mains">
			<ul class="li-main">
				<li><a href="member.html"  target="main">a 核心合作商</a></li>
				<li><a href="javascript:;"  target="main">b 特约经销商</a></li>
				<li><a href="javascript:;"  target="main">c 经销管理</a></li>
				<li><a href="javascript:;"  target="main">d 居间管理</a></li>
							
			</ul>
		</div>
		<li class="list"> <img src="<?php echo C('Admin_IMG_URL');?>1.png" width="20"/><span class="in-text">交易管理</span></li>
		<div class="mains">
			<ul class="li-main">
				<li><a href="subscription.html" target="main">a 认购信息</a></li>
				<li><a href="subscription-all.html" target="main">b 认购汇总</a></li>
				<li><a href="position.html" target="main">c 持仓汇总</a></li>
				<li><a href="delegation.html" target="main" >d 委托汇总</a></li>
				<li><a href="delegation-all.html" target="main">e 委托成交汇总</a></li>
				<li><a href="delivery.html" target="main">f 交割申请汇总</a></li>
				<li><a href="delivery-all.html" target="main">g 交割成交汇总</a></li>						
			</ul>
		</div>
		<li class="list"> <img src="<?php echo C('Admin_IMG_URL');?>1.png" width="20"/><span class="in-text">商城管理</span></li>
		<div class="mains">
			<ul class="li-main">
				<li><a href="javascript:;" target="main">a 订单管理</a></li>
				<li><a href="javascript:;" target="main">b 商品管理</a></li>
				<li><a href="javascript:;" target="main">c 公告管理</a></li>								
			</ul>
		</div>
				
	</ul>
		<iframe width="1000" height="600" name="main" src="client.html" frameborder="0" scrolling="auto" class="right">
   		 </iframe>
		
	</body>
	<script type="text/javascript">
		$('.list').click(function(){		
		    $(this).children('img').attr('src','<?php echo C('Admin_IMG_URL');?>2.png');	
		    $(this).siblings('.list').children('img').attr('src','<?php echo C('Admin_IMG_URL');?>1.png')			  	    		   
			$(this).next(".mains").slideToggle(300).siblings(".mains").slideUp(300);
		 
		});
	</script>
</html>