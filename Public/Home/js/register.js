  
  

  $("#registUserName").off("blur").on("blur", function(event) {
        var registUserName = $("#registUserName").val();
//匹配到一个非数字字符，则返回false
        var expr = /^1[3,5,7,8]\d{9}$/;
        if (!expr.test(registUserName) || registUserName.length == "") {
            $('#error').html("×").css("color","red");    
            $(this).val("");                     
        }
      var t = setTimeout(function(){
    	$('#error').html('');
   		 },2000);
        return true;
    });
    
    
    $("#registUserName2").off("blur").on("blur", function(event) {
        var registUserName = $("#registUserName2").val();
//匹配到一个非数字字符，则返回false
        var expr = /^1[3,5,7,8]\d{9}$/;
        if (!expr.test(registUserName) || registUserName.length == "") {
            $('#error2').html("×").css("color","red");  
            $(this).val("");                     
        }              
      var t = setTimeout(function(){
    	$('#error2').html('');
   		 },2000);
   		   
        return true;
    });
    




function upper(){
    	var tel =document.getElementById('registUserName').value; 	  
   	
    }
 

 		var user_Boolean = false;
    var password_Boolean = false;
    var varconfirm_Boolean = false;
    var emaile_Boolean = false;
    var Mobile_Boolean = false;
  $('.reg_user').blur(function(){
        if (( /^[\u4E00-\u9FA5]{2,6}$/).test($(".reg_user").val())){
            $('.user_hint').html("✔").css("color","green");
            user_Boolean = true;
        }else {
            $('.user_hint').html("×").css("color","red");
            user_Boolean = false;
        }
    });
//    以上是用户名

  $('.reg_password').blur(function(){
        if ((/^[a-z0-9_-]{6,16}$/).test($(".reg_password").val())){
            $('.password_hint').html("✔").css("color","green");
            password_Boolean = true;
        }else {
            $('.password_hint').html("×").css("color","red");
            password_Boolean = false;
        }
    });

     // 密码

    $('.reg_confirm').blur(function(){
        if (($(".reg_password").val())==($(".reg_confirm").val())){
            $('.confirm_hint').html("✔").css("color","green");
            varconfirm_Boolean = true;
        }else {
            $('.confirm_hint').html("×").css("color","red");
            varconfirm_Boolean = false;
        }
    });
    // 再次确认
    
    
    $('.reg_mobile').blur(function(){
        if ((/^1[34578]\d{9}$/).test($(".reg_mobile").val())){
            $('.mobile_hint').html("✔").css("color","green");
            Mobile_Boolean = true;
        }else {
            $('.mobile_hint').html("×").css("color","red");
            Mobile_Boolean = false;
        }
    });
    
//  手机号

 $('.red_button').click(function(){
        if(user_Boolean && password_Boolean && varconfirm_Boolean  && Mobile_Boolean == true){
            alert("注册成功");
        }else {
            alert("请完善信息");
        }
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
    
$('#send2').click(function(e){
	if($('input[type=text]').val() == '' || $('input[type=password]').val() == ''){
		e.preventDefault();
		e.stopPropagation();	
		$('.error').html('x').css("color","red");
	};
})


  function CheckBankNo(t_bankno) {
    var bankno =$.trim(t_bankno.val());
    if (bankno == "") {
        $("#banknoInfo").html("请填写银行卡号");
        return false;
    }
    if (bankno.length < 16 || bankno.length > 19) {
        $("#banknoInfo").html("长度必须在16到19之间");
        return false;
    }
    var num = /^\d*$/;  //全数字
    if (!num.exec(bankno)) {
        $("#banknoInfo").html("必须全为数字");
        return false;
    }
   //开头6位
    var strBin="10,18,30,35,37,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,58,60,62,65,68,69,84,87,88,94,95,98,99";    
    if (strBin.indexOf(bankno.substring(0, 2))== -1) {
        $("#banknoInfo").html("开头6位不符合规范");
        return false;
    }
    //Luhm校验（新）   
    if(!luhmCheck(bankno))
    return false;
    
    $("#banknoInfo").html("通过!").css("color","green");
    return true;
    }