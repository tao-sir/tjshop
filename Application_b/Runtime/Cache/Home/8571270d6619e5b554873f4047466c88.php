<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>person.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
   
   
</head>
<body>
	<div id="app">
		<div class="header">
			个人
		</div>
		<div class="person-show">
			<div class="balance">
				账户余额:<span><?php echo ($hy["balance"]); ?></span>
			</div>
			<div class="balance2">
				商城余额:<span><?php echo ($hy["shopbalance"]); ?></span>
			</div>
			<div class="balance2">
				冻结余额:<span><?php echo ($hy["freezebalance"]); ?></span>
			</div>
			<ul class="person-handle clear">
				<li><a href="javascript:;"><button>商城余额转入</button></a></li>
				<li class="handle"><a href="recharge_t.html"><button>充值</button></a></li>
				<li class="handle"><a href="recharge2.html"><button>提款</button></a></li>
			</ul>
		</div>
		<div class="person-mes">
			<ul class="person-item">
				<a href="personmsg.html">
					<li class="person-list clear">
						<p class="person-left">个人信息</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="bankcar.html">
					<li class="person-list clear">
						<p class="person-left">银行卡管理</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="deal.html">
					<li class="person-list clear">
						<p class="person-left">成交查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="purchase.html">
					<li class="person-list clear">
						<p class="person-left">委托查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<!-- <a href="password.html">
					<li class="person-list clear">
						<p class="person-left">修改密码</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li> -->
				</a>
				<a href="inventory.html">
					<li class="person-list clear">
						<p class="person-left">持仓查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="delivery.html">
					<li class="person-list clear">
						<p class="person-left">交割查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="shengou.html">
					<li class="person-list clear">
						<p class="person-left">申请申购</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="shengoucha.html">
					<li class="person-list clear">
						<p class="person-left">申购查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="address.html">
					<li class="person-list clear">
						<p class="person-left">收货地址</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="shopcar.html">
					<li class="person-list clear">
						<p class="person-left">购物车</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="shopcars.html">
					<li class="person-list clear">
						<p class="person-left">已购买</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="<?php echo U('Index/logout');?>">
					<input type="button"  value="退出账号" class="exit">
				</a>

				<a href="#">
					<li class="person-list clear">
						<p class="person-left"></p>
						<p class="person-arrow"></p>				
					</li>
					<li class="person-list clear">
						<p class="person-left"></p>
						<p class="person-arrow"></p>				
					</li>
				</a>
			</ul>
		</div>
		<ul class="footer">
			<li class="item"><a href="index.html"><img src="<?php echo C('IMG_URL');?>a1.png"><p>首页</p></a></li>
			<li class="item"><a href="subscribe.html"><img src="<?php echo C('IMG_URL');?>a2.png"><p>预购/预售</p></a></li>
			<li class="item"><a href="shop2.html"><img src="<?php echo C('IMG_URL');?>a3.png"><p>商城</p></a></li>
			<li class="item"><a href="notice.html"><img src="<?php echo C('IMG_URL');?>a4.png"><p>公告</p></a></li>
			<li class="item"><a href="javascript:;"><img src="<?php echo C('IMG_URL');?>b5.png"><p class="f-active">个人</p></a></li>
		</ul>
	</div>
</body>
</html>