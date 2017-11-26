<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>base.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('Admin_CSS_URL');?>table.css"/>
    <script src="<?php echo C('Admin_JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <title></title>
    <style type="text/css">
    	 body{width: 100%;height:600px;}
    	.pop{height: 100px;}
    	.sub,.add{text-align: center;padding-right: 5px;cursor: pointer;}
    	.count{width: 50px;}   	
    </style>
</head>
<body>
	<form action="" method="get">		
	<table border="0" cellspacing="0" cellpadding="10" id="table1">		
		<tr><td>电话：</td><td><input type="text" name="tel" id="" class="tel" value="<?php if($keywordtel != null): echo ($keywordtel); endif; ?>" /></td>
		<td>所属机构：</td><td><input type="text" name="compname" class="msg" id="" value="<?php if($keyword != null): echo ($keyword); endif; ?>" /></td>
		<td>从：<input type="date" name="startime" /></td>
		<td>至：<input type="date" name="endtime" /></td>
		<td class="color-l"><input type="submit" value="查询" class="search"/></td></tr>
	</table>
	</form>
	<table border="0" cellspacing="0px" cellpadding="10px" id="table2" >
	
		<tr><th>序号</th><th>电话</th><th>品种</th><th>单价</th><th>所属机构</th><th>认购申请量</th><th>认购冻结总额</th><th>申请时间</th><?php if($is_admin == 0): ?><th>操作</th><?php endif; ?></tr>

		<?php if(is_array($result)): foreach($result as $k=>$v): ?><tr class="trs">
		<td><?php echo ($k+1); ?></td>
		<!-- <td><?php echo ($v['id']); ?></td> -->
		<td><?php echo ($v['usercode']); ?></td>
		<td><?php echo ($v['productname']); ?></td>
		<td><?php echo ($v['summny']/$v['num']); ?></td>
		<td><?php echo ($v['compname']); ?></td>
		<td class="nums"><?php echo ($v['num']); ?></td>
		<td><?php echo ($v['summny']); ?></td>
		<td><?php echo ($v['ts']); ?></td>
		<?php if($is_admin == 0): if($v['status'] == 0): ?><td class="color-l set" userid="<?php echo ($v['id']); ?>" num="<?php echo ($v['num']); ?>" style="cursor:pointer;color:#fff">审核中</td>
			<?php elseif($v['status'] == 1): ?>
					<td bgcolor='#00b359' style="color:#fff">申购成功</td>
			<?php elseif($v['status'] == 2): ?>
					<td bgcolor='#ff3333' style="color:#fff">申购失败</td>
			<?php else: endif; endif; ?>
		
		<!-- <td class="color-l set"><?php echo ($v['status']); ?></td> -->
		</tr>
			
	
		
		<!-- <a href="<?php echo U('delete',array('userid' =>$v['id']));?>"><input type="button" class="agree" name="" id="refuse" value="拒绝" /></a>  --><?php endforeach; endif; ?>
</table>
<div class="pop">
		<form method="post" class="sets">
			<label for="">数量：</label>
			<input type="button" value="-" class="sub"/>
			<input type="text" name="count"  value="1" class="count"/>
			<input type="button" name="" id="" value="+" class="add" />
			<br />			
			<input type="submit" value="同意" id="sure" class="agree"/>
			<a href=""><input type="button" class="agree" name="" id="refuse" value="拒绝" /></a>
             
		</form>
           
		   <!-- <a href="<?php echo U('delete',array('info' =>$v['id']));?>"><input type="button" class="agree" name="" id="refuse" value="拒绝" /></a>  -->
          
		</div>
</body>
<script type="text/javascript">
$('.set').click(function(e){
	e.stopPropagation();
	var tel = $('input[name=tel]').val();
	var compname = $('input[name=compname]').val();
    var userid = $(this).attr("userid");
    var num = $(this).attr("num");
    $('input[name=count]').val(num);
    if(tel)
    {
    	$(".pop").find('form').attr('action',"/tjshop/index.php/Admin/Index/audit/subid/"+userid+"/tel/"+tel);
    	$(".sets").find('a').attr('href',"/tjshop/index.php/Admin/Index/delete/id/"+userid+"/tel/"+tel);
    }else{ 
    	$(".pop").find('form').attr('action',"/tjshop/index.php/Admin/Index/audit/subid/"+userid+"/compname/"+compname);
    	$(".sets").find('a').attr('href',"/tjshop/index.php/Admin/Index/delete/id/"+userid+"/compname/"+compname);
    }

    	
	$('.pop').css('background','#FFFFFF').show();
	$('body').css("background","rgba(22,22,22,.5)"); 
	var v =num;
	$('.add').click(function(e){
		e.stopPropagation();

		
		//alert(v+'==='+num)
		if(v >= num)
		{
				$('.count').val(num);
				$(this).attr("disabled", true); 
		}else{
			v++;
		$('.count').val(v);
		}
		

		//var n =$(this).parents('.trs').find('.nums').text();
		//alert(n);
		/*if(v>n-1){
		$(this).attr("disabled", true); 
		}	*/												
	});
	$('.sub').click(function(e){
		e.stopPropagation();
		if(v == 1){		
		 return $('.count').val(v);
		}
		v--
		$('.count').val(v);
		$('.add').attr("disabled", false); 


	});
	$('.agree').click(function(e){
		e.stopPropagation();
	})
	
});
$('#refuse').click(function(e){
	e.stopPropagation();
	$('.pop').hide();
	$('body').css("background","rgba(22,22,22,0)");
})

$('body').click(function(){		
		$('.pop').hide();
		$(this).css("background","rgba(22,22,22,0)");
});

$('.search').click(function(e){
	e.stopPropagation();
	var a = $('.msg').val();
	$('.msg').val(a);
	var t =$('.tel').val();
	$('.tel').val(t);
	$('.msg').focus()
})


</script>

</html>