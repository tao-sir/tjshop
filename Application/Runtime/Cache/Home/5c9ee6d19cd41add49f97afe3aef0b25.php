<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
	  <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo C('CSS_URL');?>login.css">

</head>
<body>
<div class="wrap">	
	<div class="login-top"></div>
	
	<div class="mes-wrap">	
	<div class="login-mes">
		<h2>天机电商</h2>
		<form action="" method="post">
			<label for="user"><span class="user">
			用户名：
		</span><input type="text" name="user" id="user" value="" placeholder="请输入手机号" required="required" maxlength="11"></label><span class="mobile_hint"></span>
		<br />
		<label for="psw"><span class="psw">
			密码：
		</span><input type="password" name="psw" id="psw" value="" placeholder="请输入密码" required="required" /></label>
		<br />
		<input type="submit" value="登录" id="send">
		 
			<br />
			<a href="register.html"><input type="hidden" value="注册" id="new"></a> 
			<a href="<?php echo U('User/password');?>"><input type="button" value="忘记密码" id="reset"></a>
			<dl>
			    <dd style="padding-left:60px;color:red;font-size:14px;">
						<?php echo ((isset($errorinfo) && ($errorinfo !== ""))?($errorinfo):""); ?>
			</dd>	
			</dl>
		   <!--  <li style="padding-left:60px;color:red;font-size:14px;">
						<?php echo ((isset($errorinfo) && ($errorinfo !== ""))?($errorinfo):""); ?>
			</li> -->
		</form>
		</div>
	</div>
	</div>
	
</body>
<script>
 window.onload =function(){
        $('.reg_mobile').focus()
    }
	var h = $(document).height();
	$('.wrap').height(h);
	 $('.reg_mobile').blur(function(){
        if ((/^1[34578]\d{9}$/).test($(".reg_mobile").val())){
            $('.mobile_hint').html("✔").css("color","#d8d003");
            Mobile_Boolean = true;
        }else {
            $('.mobile_hint').html("×").css("color","red");
            Mobile_Boolean = false;
        }
    });
</script>
</html>