<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
//配置文件目录
define('CONF_PATH', __DIR__.'/../conf/');
//静态资源路径
$domain = $_SERVER['SERVER_NAME'];
define('STATIC_PATH','http://'.$domain.'/static/');
//主机名、域名
define('DOMAIN_NAME','http://'.$domain.'/');
// 加载框架引导文件
  require __DIR__ . '/../thinkphp/start.php';
