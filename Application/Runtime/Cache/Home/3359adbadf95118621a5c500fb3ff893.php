<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css">
   <link rel="stylesheet" href="<?php echo C('CSS_URL');?>register.css" />
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <title>Title</title>
    <style>
     
    </style>
</head>
<body>
<div class="outer">
<ul class="wrap">
	<form action="" method="post">
	<li class="controls"><label style="display: none;">推荐人:</label><input id="registUserName2" type="hidden" name="tjnumber" value="<?php echo ($usercode); ?>" placeholder="请输入推荐人的手机号" maxlength="11" class="phone"    /></li>			
    <li class="controls"><label>用户名:</label>
    <input id="registUserName" type="text" name ="phone"  onblur="upper()" placeholder="请输入你的手机号" maxlength="11" class="phone" value=""   /><span class="error"  id='error'></span></li>

    <script type="text/javascript">
    </script>
    <span style='color:red;'><?php echo ((isset($infoerror) && ($infoerror !== ""))?($infoerror):''); ?></span>
    <li class="getparent"><label class="left">验证码：</label><input type="text" name = "code" placeholder="请输入验证码" />


   <li class="checkcode">
   
    <span><input  type="button" value="免费获取验证码" id="btn"  style="border: none;background: #0C86E5;color: #ffffff;padding: 1px 6px ;float: right; margin-right: 50px;"/></a></span><span id="sendresult"></span>
  <!-- 
    <span style='color:red;'><?php echo ((isset($infoerror) && ($infoerror !== ""))?($infoerror):''); ?></span> -->
</li>
    </li> 

 
   <li><label class="left">输入密码：</label><input type="password" placeholder="6-16位密码" name="psw" class="reg_password"><span class="password_hint error"></span></li>
    <li><label class="left">确认密码：</label><input type="password" placeholder="再次输入密码"  class="reg_confirm"/> <span class="confirm_hint error"></span></li>
    <li><input type="submit" value="注册" id="send2" /></li>

     
    
    
    </form>
</ul>
</div>
<script src="<?php echo C('JS_URL');?>register.js"></script>
<script type="text/javascript">

//点击发送短信验证码
function send(){
    //获取手机号码
    var tel = document.getElementById('registUserName').value;
    $.ajax({
		type:"post",
        url:"<?php echo U('User/sms');?>",
        data:{'tel':tel},
        dataType:'json',
        success:function(data){
            if(data.result == 1)
            {
                alert(data.msg);
                
            }else{
                alert(data.msg);
            }

        }

    });
}

  function upper(){
        var tel =document.getElementById('registUserName').value;
        $.ajax({
        url:"<?php echo U('User/register');?>",
        data:{'tel':tel},
        dataType:'json',
            });
    
    };
    $('#send2').click(function(e){
    if($('input[type=text]').val() == '' || $('input[type=password]').val() == ''){
        e.preventDefault();
        e.stopPropagation();    
        $('.error').html('x').css("color","red");
    }
    });
    $('#btn').click(function(){
        send();
        sendCode(this);
    });
</script>
<script type="text/javascript">
$('#send2').click(function(e){
	if($('input[type=text]').val() == '' || $('input[type=password]').val() == ''){
		e.preventDefault();
		e.stopPropagation();	
		$('.error').html('x').css("color","red");
	};			
})
	var h = $(document).height();
	$('.outer').height(h);
</script>

</body>

</html>