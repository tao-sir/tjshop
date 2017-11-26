<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="/Public/Home/css/base.css" />
    <link rel="stylesheet" href="/Public/Home/css/shopcar.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
   
</head>
<body>
	<div class="header">
		<div class="back">
			<a href="person.html"><img src="/Public/Home/img/back.png" width="12"/></a>
		</div>
		申请申购
	</div>
	<ul class="deal-nav clear">
		<li class="nav-left">商品</li>
		<li class="nav-cen">总量</li>
		<li class="nav-cen">剩余数量</li>
		<li class="nav-cen">单价</li>
		<li class="nav-right">操作</li>
	</ul>
	<ul class="deal-mes clear bg">
		<form action="<?php echo U('Index/ask_for');?>" method="post">
		<li class="nav-left name1" id="a1"><?php echo ($goods[0]["productname"]); ?></li>
		<li class="nav-cen sumnum1"><?php echo ($goods[0]["sumnum"]); ?></li>
		<li class="nav-cen supnum1"><?php echo ($goods[0]["supnum"]); ?></li>
		<li class="nav-cen single price1"><?php echo ($goods[0]["currentprice"]); ?></li>
		<li class="nav-right"><p class="showon">申请</p></li>
		
		<div class="pop">
			<p>数量：<input type="button" value="-" class="sub">
				   <input type="text" id="num" class="count" value="1" />
				   <input type="button" name="" class="add" value="+" />
			</p>
			<p>总价：<span class="s-total priceall"><?php echo ($price1); ?></span></p>
			<input type="hidden" name="" id="productid1" value="1" />
			<input type="" readonly="readonly" value="确定" id="sure" style="margin-top: 20px;" onclick="aaa()">
			<span class="close">X</span>
		</div>
		</form>	
			
		
	</ul>

	<ul class="deal-mes clear">
		<form action="<?php echo U('Index/ask_for');?>" method="post">
		<li class="nav-left name2" id="a2"><?php echo ($goods[1]["productname"]); ?></li>
		<li class="nav-cen sumnum2"><?php echo ($goods[1]["sumnum"]); ?></li>
		<li class="nav-cen supnum2"><?php echo ($goods[1]["supnum"]); ?></li>
		<li class="nav-cen single price2"><?php echo ($goods[1]["currentprice"]); ?></li>
		<li class="nav-right"><p class="showon">申请</p></li>
		
		<div class="pop">
			<p>数量：<input type="button" value="-" class="sub">
				   <input type="text" id="num2" class="count" value="1" />
				   <input type="button" name="" class="add" value="+" />
			</p>
			<p>总价：<span class="s-total priceall2"><?php echo ($price2); ?></span></p>
			<input type="hidden" id="productid2" value="2" />
			<input type="" readonly="readonly" value="确定" id="sure2" style="margin-top: 20px;" onclick="bbb()">
			<span class="close">X</span>
		</div>
		</form>	
	</ul>

	<ul class="deal-mes clear bg">
		<form action="<?php echo U('Index/ask_for');?>" method="post">
		<li class="nav-left name3" id="a3"><?php echo ($goods[2]["productname"]); ?></li>
		<li class="nav-cen sumnum3"><?php echo ($goods[2]["sumnum"]); ?></li>
		<li class="nav-cen supnum3"><?php echo ($goods[2]["supnum"]); ?></li>
		<li class="nav-cen single price3"><?php echo ($goods[2]["currentprice"]); ?></li>
		<li class="nav-right"><p class="showon">申请</p></li>
		
		<div class="pop">
			<p>数量：<input type="button" value="-" class="sub">
				   <input type="text" id="num3" class="count" value="1" />
				   <input type="button" name="" class="add" value="+" />
			</p>
			<p>总价：<span class="s-total priceall3"><?php echo ($price3); ?></span></p>
			<input type="hidden" name="" id="productid3" value="3" />
			<input type="" readonly="readonly" value="确定" id="sure3" style="margin-top: 20px;" onclick="ccc()">
			<span class="close">X</span>
		</div>
		</form>	
	</ul>
		
		
		<div class="all">
			
		</div>
	
	
	<!--<ul class="footer">
			<li class="item"><a href="index.html"><img src="/Public/Home/img/a1.png"><p>首页</p></a></li>
			<li class="item"><a href="subscribe.html"><img src="/Public/Home/img/a2.png"><p>预售/预购</p></a></li>
			<li class="item"><a href="shop2.html"><img src="/Public/Home/img/a3.png"><p>商城</p></a></li>
			<li class="item"><a href="notice.html"><img src="/Public/Home/img/a4.png"><p>公告</p></a></li>
			<li class="item"><a href="person.html"><img src="/Public/Home/img/b5.png"><p class="f-active">个人</p></a></li>
		</ul>-->
</body>
<script type="text/javascript" src="/Public/Home/js/shengou.js"></script>
<script type="text/javascript">
function aaa(){
	
	var name1 = $(".name1").text();
	var sumnum1 = $(".sumnum1").text();
	var supnum1 = $(".supnum1").text();
	var price1 = $(".price1").text();
	var num1 = $("#num").val();
	var productid1 = $("#productid1").val();
	var priceall1 = $(".priceall").text();

	$.ajax({
			type:"post",
			url:"<?php echo U('Index/ask_for');?>",
			data:{'productid':productid1,'name':name1,'sumnum':sumnum1,'supnum':supnum1,'price':price1,'num':num1,'priceall':priceall1},
			dataType:"json",
			success:function(data){
			 if(data.result == 1)
			 {
			 	alert(data.msg);
			 		 window.location.href="<?php echo U('Index/Shengoucha');?>"; 
			 }else{
			 	alert(data.msg);
			 }
			
			}	
		});
}
function bbb(){
	
	var name2 = $(".name2").text();
	var sumnum2 = $(".sumnum2").text();
	var supnum2 = $(".supnum2").text();
	var price2 = $(".price2").text();
	var num2 = $("#num2").val();
	var productid2 = $("#productid2").val();
	var priceall2 = $(".priceall2").text();

	$.ajax({
			type:"post",
			url:"<?php echo U('Index/ask_for');?>",
			data:{'productid':productid2,'name':name2,'sumnum':sumnum2,'supnum':supnum2,'price':price2,'num':num2,'priceall':priceall2},
			dataType:"json",
			success:function(data){
			 if(data.result == 1)
			 {
			 	alert(data.msg);
			 		 window.location.href="<?php echo U('Index/Shengoucha');?>"; 
			 }else{
			 	alert(data.msg);
			 }
			
			}	
		});
}
function ccc(){
	
	var name3 = $(".name3").text();
	var sumnum3 = $(".sumnum3").text();
	var supnum3 = $(".supnum3").text();
	var price3 = $(".price3").text();
	var num3 = $("#num3").val();
	var productid3 = $("#productid3").val();
	var priceall3 = $(".priceall3").text();

	$.ajax({
			type:"post",
			url:"<?php echo U('Index/ask_for');?>",
			data:{'productid':productid3,'name':name3,'sumnum':sumnum3,'supnum':supnum3,'price':price3,'num':num3,'priceall':priceall3},
			dataType:"json",
			success:function(data){
			 if(data.result == 1)
			 {
			 	alert(data.msg);
			 		 window.location.href="<?php echo U('Index/Shengoucha');?>"; 
			 }else{
			 	alert(data.msg);
			 }
			
			}	
		});
}
</script>
</html>