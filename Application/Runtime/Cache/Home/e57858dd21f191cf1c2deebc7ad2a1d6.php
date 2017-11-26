<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>personmsg.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <style type="text/css">
    	.msg li input{height: 40px;line-height: 40px;color: #222222;}
    	#send2{color: #ffffff}
    </style>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="<?php echo U('User/login');?>" target="_blank"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		修改密码
	</div>
	  <form action="<?php echo U('User/resetpassword');?>" method="post">
	<ul class="msg">	
	<!-- 	<li>原密码 <input type="password" name="password" id="" value="" /></li> -->
		<li>手机号 <input type="text" name="tel" id=""  /></li>	    
		
		<li>验证码  <input type="text" name="code" id="" value="" />
		<span style='color:red;'><?php echo ((isset($infoerror) && ($infoerror !== ""))?($infoerror):''); ?></span>
		<!-- <input type="button" name="code" onclick="send()" value="获取"></li> -->
		<input  type="button" value="免费获取验证码" id="btn"/ style="width:45%;position:absolute;top:-15px;right:0;">
		<li>新密码 <input type="password" name="newpwd" id="" value="" /></li>	
		<li class="editor"><input type="submit" name="" value="确定" id="send2"></li>	 
	</ul>
	 </form>
<script type="text/javascript">
//点击发送短信验证码
function send(){
    //获取手机号码
    var tel = $('[name=tel]').val();
    if (!tel) {
    	alert('手机号码不能为空');
    	exit;
    }
    $.ajax({
		type:"post",
        url:'/index.php/Home/User/sms',
        data:{'tel':tel,'type':2},
        dataType:'json',
		success:function(data)
		{
			alert(data.msg)
		}

    });
}

  function upper(){
        var tel =document.getElementById('registUserName').value;
        $.ajax({
        url:'/index.php/Home/User/register',
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
    //提交
	var clock = '';
    var nums = 60;
    var btn;
    function sendCode(thisBtn)
    {
        btn = thisBtn;
        btn.disabled = true; //将按钮置为不可点击
        btn.value = nums+'秒后可重新获取';
        clock = setInterval(doLoop, 1000); //一秒执行一次
    }
    function doLoop()
    {
        nums--;
        if(nums > 0){
            btn.value = nums+'秒后可重新获取';
        }else{
            clearInterval(clock); //清除js定时器
            btn.disabled = false;
            btn.value = '点击发送验证码';
            nums = 10; //重置时间
        }
    }
</script>
</body>
</html>