<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery.min.js"></script>
    <style>
        *{margin: 0;padding: 0}
        .wrap{width: 100%;background: url("/Uploads/img/bg1.jpg") top center no-repeat;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
    <!--此功能正在完善中，
    你可先参加天堂，
    产品的申购活动。<br/>
<a href="<?php echo U('Index/shengou');?>"><input type="button" value="前往申购"/></a>-->
    <a href="<?php echo U('Index/shengou');?>">
        <div class="wrap"></div>
    </a>
</body>
<script>
    var h = window.screen.height;
    $('.wrap').height(h);
</script>
</html>