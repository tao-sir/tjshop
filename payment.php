<?php
header ("Content-type:text/html;charset=utf-8");
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./Application/');
//绑定后台入口文件
define('BIND_MODULE','Payment');
//本地外网开关  false/外网    true/内网
define('NET_SWITCH', false);
if(NET_SWITCH){
    define('DOMAIN_NAME','http://192.168.8.200/tjshop/');
    define('SERVER','192.168.8.199');
}else{
    define('DOMAIN_NAME','http://www.qiantianzc.com/');
    define('SERVER','127.0.0.1');
}
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单