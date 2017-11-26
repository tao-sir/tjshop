<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>personmsg.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>inventory.css"/>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <style type="text/css">
    	
    </style>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="<?php echo C('IMG_URL');?>back.png" width="12"/></a>
		</div>
		持仓查询
	</div>
	<ul class="menu">
		<li class="list"> <span class="in-text">日精</span> <img src="<?php echo C('IMG_URL');?>right.png" width="20"/></li>
			
				<div class="mains">
					<form action="" method="post">
						<ul class="li-main">
							<input type="hidden" id="productid" value="1"/>
							<li class="p1">购入价格：<span class="color-b priceall"><?php echo ($rshy[0]["summny"]); ?></span></li>
							<li class="p2">持有量：<span class="color-b num"><?php echo ($rshy[0]["num"]); ?></span></li>
							<li class="p3">现价：<span class="color-b newprice"><?php echo ($rstt1["currentprice"]); ?></span></li>
							<li class="p4">浮动盈亏：<span class="color-b profit"><?php echo ($profit); ?> </span></li>
							<li class="p5">交割：<span class="line"><input type="button" value="-" class="min"><input type="text" name="" id="jg_num" class="mes" value="1" /><input type="button" class="add" value="+" id="addd"/> </span> </li>
							<li>类别：<span class="color-b">实物</span></li>
							<li style="float: right;"><button onclick="a()">确认交割</button></li>
						</ul>
					</form>
				</div>
			
		<li class="list"><span class="in-text">月华</span><img src="<?php echo C('IMG_URL');?>right.png" width="20"/></li>
			
				<div class="mains">
					<form action="" method="post">
						<ul class="li-main">
							<input type="hidden" id="productid2" value="2"/>
							<li class="p1">购入价格：<span class="color-b priceall"><?php echo ($rshy[1]["summny"]); ?></span></li>
							<li class="p2">持有量：<span class="color-b num"><?php echo ($rshy[1]["num"]); ?></span></li>
							<li class="p3">现价：<span class="color-b newprice"><?php echo ($rstt2["currentprice"]); ?></span></li>
							<li class="p4">浮动盈亏：<span class="color-b profit"><?php echo ($profit2); ?></span></li>
							<li class="p5">交割：<span class="line"><input type="button" value="-" class="min"><input type="text" name="" id="jg_num2" class="mes" value="1" /><input type="button" class="add" value="+" /> </span> </li>
							<li>类别：<span class="color-b">实物</span></li>							
							<li style="float: right;"><button onclick="b()">确认交割</button></li>
						</ul>
					</form>
				</div>
			
		<li class="list"><span class="in-text">坤宝</span><img src="<?php echo C('IMG_URL');?>right.png" width="20"/></li>
							
				<div class="mains">
					<form action="" method="post">
					 <ul class="li-main">
						<input type="hidden" id="productid3" value="3"/>
						<li class="p1">购入价格：<span class="color-b priceall"><?php echo ($rshy[2]["summny"]); ?></span></li>
						<li class="p2">持有量：<span class="color-b num"><?php echo ($rshy[2]["num"]); ?></span></li>
						<li class="p3">现价：<span class="color-b newprice"><?php echo ($rstt3["currentprice"]); ?></span></li>
						<li class="p4">浮动盈亏：<span class="color-b profit"><?php echo ($profit3); ?></span></li>
						<li class="p5">交割：<span class="line"><input type="button" value="-" class="min"><input type="text" name="" id="jg_num3" class="mes" value="1" /><input type="button" class="add" value="+" /> </span> </li>
						<li>类别：<span class="color-b">实物</span></li>							
						<li style="float: right;"> <button onclick="c()">确认交割</button></li>
						</ul>
					</form>
				</div>
										
	</ul>
	<script type="text/javascript">
		$('.list').click(function(){		
		    $(this).children('img').attr('src','<?php echo C('IMG_URL');?>up.png');	
		    $(this).siblings('.list').children('img').attr('src','<?php echo C('IMG_URL');?>right.png');	
			$(this).next(".mains").slideToggle(300).siblings(".mains").slideUp(300);
		});

		 
		$('.add').click(function(){
			var v =$(this).siblings(".mes").val();
			v++;		
			$(this).siblings('.mes').val(v);
			var total = $(this).parent().parent().siblings('.p1').find(".priceall").text();		//总钱数				
			var num = $(this).parent().parent().siblings('.p2').find(".num").text();				//拥有数量			
			var newprice =  $(this).parent().parent().siblings('.p3').find(".newprice").text();	//现价
			var average = total/num;				//单价
			var profit = (newprice-average)*v;
			$(this).parent().parent().siblings('.p4').find('.profit').text(profit);
			if(v>=num){		
				return $(this).attr('disabled',true);
			};								
		})
		$('.min').click(function(){
			var v =$(this).siblings(".mes").val();		
			if(v == 1){			
				return  $(this).siblings('.mes').val(1);
			}
			v--;
			var total = $(this).parent().parent().siblings('.p1').find(".priceall").text();		//总钱数				
			var num = $(this).parent().parent().siblings('.p2').find(".num").text();				//拥有数量			
			var newprice =  $(this).parent().parent().siblings('.p3').find(".newprice").text();	//现价
			var average = total/num;				//单价
			var profit = (newprice-average)*v;
			$(this).parent().parent().siblings('.p4').find('.profit').text(profit);
			$(this).siblings('.mes').val(v);
			$(this).siblings('.add').attr('disabled',false);			
		})
		function a(){
		var productid = $("#productid").val();	//产品编号		
		var jg_num = $("#jg_num").val();		//交割数量	
		//var profit = $(".profit").text();		//浮动盈亏
		var newprice = $('#productid').siblings('.p3').find(".newprice").text();	//现价
		
		$.ajax({
				type:"post",
				url:"<?php echo U('Index/transaction');?>",
				data:{'productid':productid,'jg_num':jg_num,'newprice':newprice},
				dataType:"json",
				success:function(data){
				 if(data.result == 1)
				 {
					alert(data.msg);
						 window.location.href="<?php echo U('Index/Delivery');?>"; 
				 }else{
					alert(data.msg);
				 }
				
				}	
			});
				$(".#form").submit();
		}
		function b(){
		var productid = $("#productid2").val();	//产品编号		
		var jg_num = $("#jg_num2").val();		//交割数量	
		//var profit = $(".profit").text();		//浮动盈亏
		var newprice = $('#productid2').siblings('.p3').find(".newprice").text();	//现价
		
		$.ajax({
				type:"post",
				url:"<?php echo U('Index/transaction');?>",
				data:{'productid':productid,'jg_num':jg_num,'newprice':newprice},
				dataType:"json",
				success:function(data){
				 if(data.result == 1)
				 {
					alert(data.msg);
						 window.location.href="<?php echo U('Index/Delivery');?>"; 
				 }else{
					alert(data.msg);
				 }
				
				}	
			});
				$(".#form").submit();
		}
		function c(){
		var productid = $("#productid3").val();	//产品编号		
		var jg_num = $("#jg_num3").val();		//交割数量	
		//var profit = $(".profit").text();		//浮动盈亏
		var newprice = $('#productid3').siblings('.p3').find(".newprice").text();	//现价
		
		$.ajax({
				type:"post",
				url:"<?php echo U('Index/transaction');?>",
				data:{'productid':productid,'jg_num':jg_num,'newprice':newprice},
				dataType:"json",
				success:function(data){
				 if(data.result == 1)
				 {
					alert(data.msg);
						 window.location.href="<?php echo U('Index/Delivery');?>"; 
				 }else{
					alert(data.msg);
				 }
				
				}	
			});
				$(".#form").submit();
		}
		
	</script>
</body>
</html>