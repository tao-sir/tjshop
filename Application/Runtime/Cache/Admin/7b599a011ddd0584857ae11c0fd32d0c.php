<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<script src="<?php echo C('Admin_JS_URL');?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			.addNotice{border: 1px solid #333333; width: 80px;padding: 10px;
			background: #008000;color: #FFFFFF;}
			.Ntab{margin-top: 50px;}
			.del{background: red;color: #FFFFFF;}
			.addNotice a{text-decoration: none;color: #FFFFFF;}
			th{white-space: nowrap}
			td{white-space: nowrap}
		</style>
	</head>
	<body>
		<div class="addNotice">
			<a href="notice.html">添加新公告</a>
		</div>
		<table border="1" cellspacing="0" cellpadding="10" class="Ntab">
			<tr><th>序号</th><th>公告标题</th><th>发布时间</th><th>操作</th></tr>
			<?php if(is_array($data)): foreach($data as $k=>$v): ?><tr>
					<td><?php echo ($k+1); ?></td>
					<td><?php echo ($v["title"]); ?></td>
					<td><?php echo ($v["ts"]); ?></td>
					<td class="del">删除</td>
					<input type="hidden" value="<?php echo ($v["id"]); ?>"/>
				</tr><?php endforeach; endif; ?>
		</table>
		<script type="text/javascript">
			$('.del').click(function(){
			    var nid = $(this).next().val();
				var is_sub = confirm('确定删除吗');

			    if(is_sub)
				{
				    $.ajax({
						type:'post',
						url:"<?php echo U('Notice/noticeDel');?>",
						dataType:'json',
						data:{'id':nid},
						success:function (data) {
							if(!data.result)
							{
							    alert(data.msg);
							}
                        }
					});
                    $(this).parent().remove();
				}
			})
		</script>
	</body>
</html>