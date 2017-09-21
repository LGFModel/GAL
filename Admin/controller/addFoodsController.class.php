<?php
namespace Admin\controller;
use \Frame\libs\baseController;
use Admin\model\indexModel;

/**
 * 添加食物控制器
 */

class addFoodsController extends baseController
{

	public $mod = null;

	public function __construct(){

		parent::__construct();
		$this->mod = new indexModel();
	}
	public function index(){

		$this->smarty->display("foods.html");

	}



	public function add(){



		if ($_POST['pid'] == "set") {
			$sql = "select id from dining order by id  desc limit 1";
			$id;
			if (!empty($_GET['id'])) {
				$id = $_GET['id'];
			}else {
				$id = $this->mod->fetchOne($sql)['id'];
			}
			echo "$id";
			$name = $_POST["foodname"];
			$price = $_POST['price'];


			if ($this->mod->exec("insert into foods(name,price,pid) values('$name',{$price},{$id})")) {
				echo "添加成功";
			}
		}

	}
}
