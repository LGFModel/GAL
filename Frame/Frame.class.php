<?php
namespace Frame;
class Frame{
	static function run(){
		/**
		 * 配置信息
		 */
		// 配置相关文件信息
		self::setCharset();

		// 配置配置信息(默认基础参数)
		self::setInfo();

		// 初始化路由
		self::initRoute();

		// 常用常量
		self::initConst();

		// 类的自动加载
		self::initAutoLoad();

		// 请求分支
		self::initDis();
	}

	private static function setCharset(){
		header("content-type:text/html;charset=utf8");
	}

	private static function setInfo(){
		 $GLOBALS["config"] = require_once(APP_PATH.DS."conf".DS."config.php");
	}

	/**
	 * 这个地方,上面执行结束后
	 */
	private static function initRoute(){
		$p =  $GLOBALS["config"]["default_platform"];

		$a =  isset($_GET["a"])?$_GET["a"]:$GLOBALS["config"]["default_action"];

		$c =  isset($_GET["c"])?$_GET["c"]:$GLOBALS["config"]["default_contrller"];
		define("ACTION", $a);
		define("CONTROLLER", $c);
		define("PLAT", $p);
	}

	private static function initConst(){
		define("VIEW", APP_PATH.DS."view");
		define("FRAME",ROOT_PATH.DS."Frame");
	}
	// 类的自动加载
	private static function initAutoLoad(){
		// indexController
		spl_autoload_register(function($className){

			$className = ROOT_PATH.DS.str_replace("\\", DS, $className).".class.php";

		if (file_exists($className)) {
				require_once($className);
			}
		});
	}

	// 请求分支
	private static function initDis(){
		$className = PLAT.DS."controller".DS.CONTROLLER."Controller";
		$cont = new $className();
		$action = ACTION;
		$cont->$action();
	}
}

?>
