<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <script type="text/javascript">
    
    	
   		
    </script>
    <style type="text/css">
   		.notice-main{width: 89%;margin: 0 auto;background: #ededed;border-radius: 20px;margin-top: 20px;}
  		.notice-title{width: 90%;margin: 0 auto;border-bottom: 1px solid #0C86E5;line-height: 50px;}
  		.notice-mes{width: 90%;margin: 0 auto;height: 150px;font-size: 16px;}
  		.notice-mes p{ width:100%;line-height: 35px;margin-top: 10px;}
  		.notice-title span{}
  		.sub-title{font-size: 18px;}
  		.tag{float: right;}
    	
    	
    </style>
</head>
<body>
	<div id="app">
		<div class="header">
			公告
		</div>
		<?php if(is_array($data)): foreach($data as $key=>$v): ?><div class="notice-main">
				<div class="notice-title clear">
					<span class="sub-title color-b"><?php echo ($v["title"]); ?></span><span class="tag"><?php echo ($v["ts"]); ?></span>
				</div>
				<div class="notice-mes">
					<p><?php echo ($v["content"]); ?></p>
				</div>
			</div><?php endforeach; endif; ?>
		<!--<div class="notice-main">-->
			<!--<div class="notice-title clear">-->
				<!--<span class="sub-title color-b">这是标题</span><span class="tag">2017-02-25</span>-->
			<!--</div>-->
			<!--<div class="notice-mes">-->
				<!--<p>这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="notice-main">-->
			<!--<div class="notice-title clear">-->
				<!--<span class="sub-title color-b">这是标题</span><span class="tag">2017-02-25</span>-->
			<!--</div>-->
			<!--<div class="notice-mes">-->
				<!--<p>这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="notice-main">-->
			<!--<div class="notice-title clear">-->
				<!--<span class="sub-title color-b">这是标题</span><span class="tag">2017-02-25</span>-->
			<!--</div>-->
			<!--<div class="notice-mes">-->
				<!--<p>这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>-->
			<!--</div>-->
		<!--</div>-->
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