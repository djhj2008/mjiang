<?php
header("content-type:text/html;charset=utf-8");
//设置模式
define('APP_DEBUG',true);//开发调试模式
//路径
define('ACSS_URL','/mjiang/Home/Public/css/');
define('JQPLOT','/mjiang/Home/Public/jqplot/');

define('LIKEPLUS','/mjiang/Home/');
define('AJS_URL','/mjiang/Home/Public/js/');
define('ABOOT_URL','/mjiang/Home/Public/bootstrap/');
define('ACK_URL','/mjiang/Home/Public/ckeditor/');
define('AIMAGE_URL','/mjiang/Home/Public/images/');
define('PUBLIC_ROOT_URL','/mjiang/Home/Public/');
define('SCWS_DICT_URL','/mjiang/Home/Public/dict/');
define('SHOP_URL','/mjiang/Home/Public/shop/');
define('WEUI_URL','/mjiang/Home/Public/weui');
//引入tp框架的接口文件
include "./ThinkPHP/ThinkPHP.php";