<?php
return array(
	//'配置项'=>'配置值'
	'CSS_URL' => '/Public/Home/css/',
    'JS_URL' => '/Public/Home/JS/',
    'IMG_URL' => '/Public/Home/img/',
    'IMGS_URL' => '/Public/Home/images/',
    // Admin后台配置样式
    'Admin_CSS_URL' => __ROOT__.'/Public/Admin/css/',
	'Admin_JS_URL' => __ROOT__.'/Public/Admin/JS/',
	'Admin_IMG_URL' => __ROOT__.'/Public/Admin/img/',
	'Admin_IMGS_URL' => __ROOT__.'/Public/Admin/images/',

    'QRCODE_URL' =>__ROOT__.'/Uploads/Code/',


    /*'TMPL_L_DELIM'=>'<{',
    'TMPL_R_DELIM'=>'}>',*/

	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',      // 数据库类型
    'DB_HOST'               =>  '127.0.0.1',  // 服务器地址
    // 'DB_HOST'               =>  'localhost',  // 服务器地址
    'DB_NAME'               =>  'ebdb',       // 数据库名
    'DB_USER'               =>  'root',       // 用户名
    'DB_PWD'                =>  'root',       // 密码
    'DB_PORT'               =>  '',           // 端口,默认3306
    'DB_PREFIX'             =>  '',        // 数据库表前缀

    //DSN方式配置数据库
    //'DB_DSN' => 'mysql://root:root@localhost:3306/ebdb#utf8',
);