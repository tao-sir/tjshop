<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>shopcar.css" />
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <style>
        .deal-mes li:nth-of-type(3) {
            width: 40%;
        }
        .deal-nav li:nth-of-type(3) {
            width: 40%;
        }
    </style>

   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="<?php echo U('Deal/rechargeT');?>"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		充值记录
	</div>
	<ul class="deal-nav clear">
		<li class="nav-cen">充值金额</li>
		<li class="nav-cen">充值类型</li>
		<li class="nav-right">充值时间</li>
        <li class="nav-cen">状态</li>
	</ul>
	<?php if(is_array($recharge)): $i = 0; $__LIST__ = $recharge;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><ul class="deal-mes clear bg">
			<li class="nav-cen"><?php echo ($data["money"]); ?></li>
			<li class="nav-cen">
                <?php if($data["topuptype"] == 1): ?>支付宝
					<?php elseif($data["topuptype"] == 2): ?>微信
                    <?php elseif($data["topuptype"] == 3): ?>网银<?php endif; ?>
            </li>
			<li class="nav-right cloor-g"><?php echo ($data["ts"]); ?></li>
            <li class="nav-right cloor-g">
                <?php if($data["topupstatus"] == 1): ?>成功
                    <?php else: ?><span style="color:red">失败</span><?php endif; ?>
            </li>
		</ul><?php endforeach; endif; else: echo "" ;endif; ?>
	
	

</body>
</html>