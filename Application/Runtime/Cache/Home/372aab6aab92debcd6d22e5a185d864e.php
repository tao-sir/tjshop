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
   		.pupon{
   			width: 70%;position: fixed;top: 150px;left: 15%;background: #FFFFFF;height: 150px;z-index: 10;text-align: center;font-size: 18px;display: none;
   		}
   		.pupon p{line-height: 40px;margin-top: 20px;}
   		.alls{width: 100%;height: 100%;position: fixed;top: 0;left: 0;opacity: 0.5;background: #38536B;display: none;}
   	</style>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
			
		</div>
		提现
		<span style="position: absolute;right: 20px;">
			<a href="<?php echo U('Index/Withdrawal');?>" style="color: #FFFFFF;font-size: 14px;" >提现记录</a></span>
	</div>
	<div class="card-wrap">
		<div class="addcard clear">
			<a href="addcard.html"><div class="card">
				添加银行卡
			</div></a>
			
			<!--<div class="third">
				第三方
			</div>-->
		</div>
		<ul class="card-gem">
			<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input	type="hidden" id="cardid" value="<?php echo ($vo["id"]); ?>">
				<li> <span class="bankName"><?php echo ($vo["bankname"]); ?></span><span class="bankCard"> <?php echo ($vo["head"]); ?>**********<?php echo ($vo["ending"]); ?></span>  </li>
				<!--<li>工商银行   <span>6217**********1254</span></li>--><?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="card-mes">
				<form action="<?php echo U('Index/recharge');?>" method="post">
					<input	type="hidden" name="cardid" value=""/>
					<p> <span class="recBank"></span><span class="recCard"></span></p>
					<!--<form action="<?php echo U('Index/recharge');?>" method="post">-->
					<ul class="card-form">
						<li>额度：<input type="text" name="money" id="dd" value="" placeholder="请输入100整数倍"/></li>
						<!-- <li>密码：<input type="password" name="pw2" id="" value="" /></li> -->
						<li class="login"><input type="submit" id="log" value="提款" ></li>
					</ul>
				</form>
			</div>
		</ul>
		
	</div>

	<!--<div class="pupon">
		<p>支付宝</p>
		<p>微信</p>
	</div>-->
	<div class="alls">
		
	</div>
	<script type="text/javascript">
		$('.third').click(function(){
			$('.pupon').show()
			$('.alls').show()
		});
		$('.alls').click(function(){
			$('.pupon').hide()
			$('.alls').hide()
		});
		
		$('input[name=money]').blur(function(){
				var v =$(this).val();
				var rem = v % 100;
				if(rem !=0){
					alert('请输入100整数倍');
					$(this).val('')
				}				
			})		

		$('.card-gem>li').click(function(){
		    var v = $(this).prev().val();
		    var bankName =$(this).children('.bankName').text();
		    var bankCard=$(this).children('.bankCard').text();
		  	var recBank =$(this).siblings('.card-mes').find('.recBank').text(bankName);
		  	var recCard =$(this).siblings('.card-mes').find('.recCard').text(bankCard);
		  	var recVal =$(this).siblings('.card-mes').find('input[name=cardid]').val(v);
			$('.card-mes').show()

		});






		$('.login').click(function(){
			$('.card-mes').hide()
		})





	</script>
</body>
</html>