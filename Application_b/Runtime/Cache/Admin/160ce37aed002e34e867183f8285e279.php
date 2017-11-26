<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>base.css"/>
    <link rel="stylesheet" href="<?php echo C('Admin_CSS_URL');?>table.css" />
    <script src="<?php echo C('Admin_JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">
    		body{height: 600px;}    		
    		.pop2,.pop3{width:400px;height:120px;position: fixed;top:30%;left: 20%;border: 1px solid #222222;font-size: 16px;display: none;padding: 20px;z-index: 3;}
    		.close{position: absolute;top: 10px;right: 20px;display: block;background: #2CCF9F; color: #FFFFFF;padding: 5px;cursor: pointer;}
    		input[type=radio]{margin-top: 5px;}
    		.choice{margin-top: 20px; cursor: pointer;}
    		.num{margin-bottom: 10px;}
    </style>
    <title></title>  
</head>
<body>
	<form action="<?php echo U('Index/client');?>" method="post">				
	<table border="0" cellspacing="0" cellpadding="10" id="table1">		
		<tr>
		<td>客户归属：</td><td><input type="text" name="compname" id="" class="msg" value="<?php if($compname != null): echo ($compname); endif; ?>" /></td>
		<td>电话：</td><td><input type="tel" name="tel" class="tel" id="" value="<?php if($keyword != null): echo ($keyword); endif; ?>" /></td>
		<td class="color-l"><input type="submit" value="查询" class="search"/></td></tr>
	</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table2" >	
		<tr>
		<th>序号</th>
		<th>电话</th>
		<th>姓名</th>
		<th>身份证号</th>
		<th>开户时间</th>
		<th>所属特约</th>
		<th>所属经销</th>
		<th>所属代理</th>
		<?php if($is_admin === 0): ?><th>密码修改</th>
				<th>权限设置</th>
				<th>删除</th><?php endif; ?>
		</tr>

		<?php if(is_array($shuju)): foreach($shuju as $k=>$v): ?><tr>
		<td><?php echo ($v['userid']); ?></td>
		<td><?php echo ($v['usercode']); ?></td>
		<td><?php echo ($v['realname']); ?></td>
		<td><?php echo ($v['cardid']); ?></td>
		<td><?php echo ($v['ts']); ?></td>
		
		<td>一级</td>
		<td>河南科技有限公司</td>
		<td>二级</td>
			<?php if($is_admin === 0): ?><td class=""><p class="change color-l">登录密码</p><p class="color-b change2">资金密码</p></td>
		<!-- <td class="color-l set" onclick="set()"><a href="<?php echo U('upuser',array('userid'=>$v['userid']));?>">点击设置</a></td> -->
		<td class="color-l set" userid="<?php echo ($v['userid']); ?>">点击设置</td>
		<td class="color-r del"><a href="<?php echo U('upd',array('userid'=>$v['userid']));?>">删除</a></td><?php endif; ?>
		</tr><?php endforeach; endif; ?>
	
		
	</table>
	<div class="pop tan">


		<form  method="post" class="sets">
		<label for="">公司名称：</label>
			<input type="hidden" name="tel" value="<?php if($keyword != null): echo ($keyword); endif; ?>"/>
			<input type="text" name="compname" /><br />
			<label for="">公司电话：</label>
			<input type="text" name="compphone" id="" value="" /><br />
			<label for="">编号：</label>
			<input type="text" name="compcode" />
			<br />
			<label for="" class="user-s">管理员：</label>
			<input type="radio" name="isadmin" value="1" class='isadmin_1' />
			是
			<input type="radio" name="isadmin" value="0" class='isadmin_0' />
			否<br />
			<select name="usernature" class="option">				
				<option value="">级别：</option>
				<option value="1">核心合作商</option>
				<option value="2">特约经销商</option>				
				<option value="3">经销商</option>
				<option value="4">居间商</option>
			</select><br />
			<input type="submit" value="确定"/ id="sure">
		</form>


		<span class="close">X</span>
	</div>
	<div class="pop2 tan">
		<form action="" method="post" class="sets">
			<label for="">登录密码修改：</label>
			<input type="text" /><br />						
			<input type="submit" value="确定"/ id="sure2">
		</form>
		<span class="close">X</span>
	</div>
		<div class="pop3 tan">
		<form action="" method="post" class="sets">
			<label for="">资金密码修改：</label>
			<input type="text"/><br />						
			<input type="submit" value="确定"/ id="sure2">
		</form>
		<span class="close">X</span>
		</div>
	
	<?php if($is_succeed == 1): ?><span class="is_succeed" issucceed="<?php echo ($is_succeed); ?>">

		成功

		</span>
	<?php elseif($is_succeed == 2): ?>
		<span>失败</span><?php endif; ?>
	<span class="is_succeed" issucceed="<?php echo ($is_succeed); ?>">

	</span>
</body>
<script type="text/javascript">
$('.change').click(function(e){
		e.stopPropagation();
		$('.pop2').css('background','#FFFFFF').show();
		$('body').css("background","rgba(22,22,22,.5)"); 
})
$('input').click(function(e){
	e.stopPropagation();
});
$('select').click(function(e){
	e.stopPropagation();
})
$('.change2').click(function(e){
		e.stopPropagation();
		$('.pop3').css('background','#FFFFFF').show();
		$('body').css("background","rgba(22,22,22,.5)");			
});
$('.set').click(function(e){
	e.stopPropagation();
	var userid = $(this).attr("userid");
    $(".pop").find('form').attr('action',"/tjshop/index.php/Admin/Index/upuser/userid/"+userid);
	$.ajax({
		url:"/tjshop/index.php/Admin/Index/userinfo",
		type:"get",
		data:{"userid":userid},
		dataType:"json",
		success:function(data)
		{
			if(data.result == 1)
			{
				$('input[name=compname]').val(data.data.compname);
				$('input[name=compphone]').val(data.data.compphone);
				$('input[name=compcode]').val(data.data.compcode);
//				if(data.data.isadmin == 0)
//				{
//                    $('input[name=isadmin]').eq(1).val(data.data.isadmin);
//				}else {
//                    $('input[name=isadmin]').eq(1).val(data.data.isadmin);
//                }

				if(data.data.isadmin == 1)
				{
					$(".isadmin_1").attr("checked","checked");
				}else{
					$(".isadmin_0").attr("checked","checked");
				}

				$(".option").find("option").eq(data.data.usernature).attr("selected","selected");
								
			}else{
				alert("获取失败")
			}
			$('.pop').css('background','#FFFFFF').show();
	$('body').css("background","rgba(22,22,22,.5)"); 
		}
	});
	

});
$('.del').click(function(e){
	e.stopPropagation();
	var r=confirm("确定要删除吗？")
  	if (r==true){
   		 $(this).parent().remove();
   } 	
});
$('body').click(function(){
	$('.tan').hide();
	$('body').css("background","rgba(22,22,22,0)");
});
$('.search').click(function(e){
	e.stopPropagation();
	var a = $('.msg').val();
	$('.msg').val(a);
	var t =$('.tel').val();
	$('.tel').val(t);
	$('.msg').focus()
})

//function set(id){
//	alert(id)
//	$('.pop').css('background','#FFFFFF').show();
// 	$('body').css("background","rgba(22,22,22,.5)");
//
// 	$(".pop").find('form').attr('action',"/tjshop/index.php/Admin/Index/upuser/userid/"+id);
//
//}

</script>

</html>