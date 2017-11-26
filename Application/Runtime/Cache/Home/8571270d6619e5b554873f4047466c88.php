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
				申购金额:<span><?php echo ($hy["freezebalance"]); ?></span>
			</div>
			<ul class="person-handle clear">
				<li><a href="javascript:;"><button>商城余额转入</button></a></li>
				<li class="handle"><a href="<?php echo U('Deal/rechargeT');?>"><button>充值</button></a></li>
				<li class="handle"><a href="<?php echo U('Index/recharge2');?>"><button>提款</button></a></li>
			</ul>
		</div>
		<div class="person-mes">
			<ul class="person-item">
				<a href="<?php echo U('Index/personmsg');?>">
					<li class="person-list clear">
						<p class="person-left">个人信息</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="<?php echo U('Index/bankcar');?>">
					<li class="person-list clear">
						<p class="person-left">银行卡管理</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<!--<a href="<?php echo U('Index/deal');?>">-->
				<a href="<?php echo U('Public/tishi');?>">
					<li class="person-list clear">
						<p class="person-left">成交查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<!--<a href="<?php echo U('Index/purchase');?>">-->
				<a href="<?php echo U('Public/tishi');?>">
					<li class="person-list clear">
						<p class="person-left">委托查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>

				<a href="<?php echo U('Index/inventory');?>">
					<li class="person-list clear">
						<p class="person-left">持仓查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<!--<a href="<?php echo U('Index/delivery');?>">-->
				<a href="<?php echo U('Public/tishi');?>">
					<li class="person-list clear">
						<p class="person-left">交割查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="<?php echo U('Index/shengou');?>">
					<li class="person-list clear">
						<p class="person-left">申请申购</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<a href="<?php echo U('Index/shengoucha');?>">
					<li class="person-list clear">
						<p class="person-left">申购查询</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<!--<a href="<?php echo U('Index/address');?>">-->
				<a href="<?php echo U('Public/tishi');?>">
					<li class="person-list clear">
						<p class="person-left">收货地址</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<!--<a href="<?php echo U('Index/shopcar');?>">-->
				<a href="<?php echo U('Public/tishi');?>">
					<li class="person-list clear">
						<p class="person-left">购物车</p>
						<p class="person-arrow"><img src="<?php echo C('IMG_URL');?>arrow-right.png" width="30"></p>				
					</li>
				</a>
				<!--<a href="<?php echo U('Index/shopcars');?>">-->
				<a href="<?php echo U('Public/tishi');?>">
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
</body>
</html>