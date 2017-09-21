<?php 

/**
 * 动态斜线
 * 网站根目录
 * 当前目录
 * 加载配置文件(自动加载类文件)
 * 设置数据库
 */

define("DS", DIRECTORY_SEPARATOR);
define("ROOT_PATH",getcwd());
define("APP_PATH",ROOT_PATH.DS."Admin");

require_once(ROOT_PATH.DS."Frame".DS."Frame.class.php");
\Frame\Frame::run();

