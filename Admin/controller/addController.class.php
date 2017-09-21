<?php 
namespace Admin\controller;
use \Frame\libs\baseController;
use Admin\model\indexModel;

/**
 * 添加餐厅控制器
 */

class addController extends baseController
{
	public $mod = null;

	public function __construct(){

		parent::__construct();
		$this->mod = new indexModel();
	}

	public function index()
	{
		$this->smarty->display("add.html");
	}

	public function add(){

		if (!empty($_POST['name'])&&!empty($_POST["manager"])) 
		{			
			$name = $_POST['name'];
			$manager = $_POST['manager'];

			if ($this->mod->exec("insert into dining(name,manager) values('$name','$manager')")) {
				$this->jump("$name 添加成功","addFoods&index");
			}
		}
	}
}