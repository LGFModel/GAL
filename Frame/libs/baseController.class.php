<?php 
namespace Frame\libs;
require_once(FRAME.DS."vendor".DS."Smarty.class.php");
use \Frame\vendor\Smarty;

class baseController{

	public $smarty = NULL;

	public function __construct(){
		$smarty = new Smarty();
		$smarty->left_delimiter="<{";
		$smarty->right_delimiter = "}>";
		
		$smarty->setTemplateDir(VIEW);	//视图文件目录

		$smarty->setCompileDir(sys_get_temp_dir().DS."view_c".DS);
		$this->smarty = $smarty;
	}

	public function jump($message,$url){
		echo $message;
		header("refresh:3;url='?c=$url'");
	}
}