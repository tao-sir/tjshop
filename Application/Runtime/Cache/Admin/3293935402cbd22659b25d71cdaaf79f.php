<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<style type="text/css">
			.wrap {
				position: relative;
			}
			input{border: none;outline: none}
			.title {
				padding-top: 50px;
				font-weight: normal;
			}
			
			.titleIn {
				font-size: 20px;
			}
			
			.titleCon {
				margin-top: 30px;
			}
			
			.edit-title {
				width: 80%;
				border-bottom: 1px solid #2CB2CF;
				margin-left: 20px;
				line-height: 30px;
				font-size: 16px;
			}
			
			.content {
				font-size: 18px;
				margin-left: 100px;
				padding: 15px;
				width: 80%;
				height: 300px;
				border: 1px solid #2CB2CF;
				overflow: auto;
				text-indent: 2em;
				line-height: 1.5;
			}
			
			#sure {
				position: fixed;
				width: 60px;
				height: 30px;
				line-height: 30px;
				background: #2CB2CF;
				color: #FFFFFF;
				border-radius: 5px;
				font-size: 16px;
				right: 10%;
				bottom: 3%;
			}
		</style>
	</head>

	<body>
		<div class="wrap">
			<form action="<?php echo U('Notice/addNotice');?>" method="post" class="">
				<div class="title">
					<span class="titleIn">文章标题</span>
					<input type="text" name="title" autofocus="autofocus" value="<?php echo ($data["title"]); ?>" class="edit-title">
				</div>
				<p class="titleIn titleCon">文章内容：</p>
				<textarea class="content" name="content"><?php echo ($data["content"]); ?></textarea>
				<input type="submit" value="发布"  id="sure">
			</form>

		</div>
	</body>

</html>