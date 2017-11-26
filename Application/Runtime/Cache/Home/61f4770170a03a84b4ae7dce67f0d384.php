<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>personmsg.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>luhmCheck.js"></script>
    <style type="text/css">
    	.msg li input{height: 40px;line-height: 40px;color: #222222;}
    	#send2{color: #FFFFFF;}
    	input{text-indent: 10px;}
    	#banknoInfo{font-size: 14px;color: red;margin-left: 10px;}
    	.obligate{margin-top: 40px;}
    	.error{float: right;}
    	
    </style>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="bankcar.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		添加银行卡
	</div>
	
		
		
	<ul class="msg">
		<form action="<?php echo U('Index/upaddcard');?>" method="post">
		<li>持卡人姓名 <input type="text" class="reg_user" name="user" value="" placeholder="2-6位汉字" autofocus="autofocus"/><br /><span class="error user_hint"></span></li>
		
		
		<li>银行卡号 <input type="text" name="bank"   id="t_bankno" onblur="CheckBankNo($(this))" value="" placeholder="输入银行卡号"/><br/><span id="banknoInfo" class="error"></span></li>
		
		
		<li style="margin-top: 40px;">预留手机号 <input type="text" name="tel" class="reg_mobile" id="" value="" maxlength="11" placeholder="输入手机号"/><br /><span class="error mobile_hint"></span></li>
		
	<!--
		<li>验证码  <input type="text" name="code" id="" value="" /><br/></li>-->
		
		
		<li class="editor"><input type="submit" value="确定添加" id="send2"/></li>
		
		
	</form>
	</ul>
</body>
<script type="text/javascript" src="<?php echo C('JS_URL');?>addcar.js">

</script>
</html>