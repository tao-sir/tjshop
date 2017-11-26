<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="/tjshop/Public/Home/css/base.css" />
    <link rel="stylesheet" href="/tjshop/Public/Home/css/shopcar.css" />
    <script type="text/javascript" src="/tjshop/Public/Home/js/jquery.min.js"></script>
    
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="/tjshop/Public/Home/img/back.png" width="12"/></a>
		</div>
		申购查询
	</div>
	<ul class="deal-nav clear">
		<li class="nav-left">商品</li>
		<li class="nav-cen">数量</li>
		<li class="nav-cen">总价</li>
		<li class="nav-cen">状态</li>
	</ul>
	<?php if(is_array($rs)): $i = 0; $__LIST__ = $rs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="deal-mes clear bg">
			<li class="nav-left">
				<?php if($vo["productid"] == 1): ?>日精
				<?php elseif($vo["productid"] == 2): ?>月华
				<?php else: ?> 坤宝<?php endif; ?>
			</li>
			<li class="nav-cen"><?php echo ($vo["num"]); ?></li>
			<li class="nav-cen"><?php echo ($vo["summny"]); ?></li>
			<li class="nav-right cloor-g">
				<?php if($vo["status"] == 0): ?><span style="color:cornflowerblue">审核中</span>
				<?php elseif($vo["status"] == 1): ?><span style="color:green">申购成功</span>
				<?php else: ?> <span style="color:red">申购失败</span><?php endif; ?>
			</li>   
		</ul><?php endforeach; endif; else: echo "" ;endif; ?>
	<!-- <ul class="deal-mes clear">
		<li class="nav-left">月华</li>
		<li class="nav-cen">9</li>
		<li class="nav-cen">90</li>
		<li class="nav-right color-y">审核中</li> 
	</ul>
	<ul class="deal-mes clear bg">
		<li class="nav-left">坤宝</li>
		<li class="nav-cen">8</li>
		<li class="nav-cen">80</li>
		<li class="nav-right color-r">失败</li>
		         
	</ul> -->
	
	
	<ul class="footer">
			<li class="item"><a href="index.html"><img src="/tjshop/Public/Home/img/a1.png"><p>首页</p></a></li>
			<li class="item"><a href="subscribe.html"><img src="/tjshop/Public/Home/img/a2.png"><p>预售/预购</p></a></li>
			<li class="item"><a href="shop2.html"><img src="/tjshop/Public/Home/img/a3.png"><p>商城</p></a></li>
			<li class="item"><a href="notice.html"><img src="/tjshop/Public/Home/img/a4.png"><p>公告</p></a></li>
			<li class="item"><a href="person.html"><img src="/tjshop/Public/Home/img/b5.png"><p class="f-active">个人</p></a></li>
		</ul>
</body>
</html>