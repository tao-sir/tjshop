<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>personmsg.css"/>
    <script src="<?php echo C('JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo C('JS_URL');?>person.js" type="text/javascript" charset="utf-8"></script>
  
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		个人信息
	</div>
	<ul class="msg">	
		<form action="" method="post">							
		<li >姓名：<input type="text" value="<?php echo ($info["realname"]); ?>" id="sr" name="realname" disabled></li>
		<li style="color:#a3a3a3">手机号：<input type="text" value="<?php echo ($info["usercode"]); ?>" id="tel" disabled></li>
		<li>身份证号：<input type="text" value="<?php echo ($info["cardid"]); ?>" name="cardid" id="shenfen" disabled></li>
		<li style="color:#a3a3a3">注册时间：<?php echo ($info["ts"]); ?></li>
		<p id="erweima"><img src="<?php echo C('QRCODE_URL'); echo ($info["qrcode"]); ?>.png"  width="100%"/></p>
		<input type="button" name="" id="btn" value="编辑" class="editor"/>		
		<input type="submit" id="send" value="保存"/>
		</form>
	</ul>

</body>
</html>