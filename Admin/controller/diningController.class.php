<?php
namespace Admin\controller;
use \Frame\libs\baseController;
use Admin\model\indexModel;

class diningController extends baseController
{
	// 餐厅控制器
	// 展示 菜单 和 添加 修改菜单
	public function index(){
		$mod = new indexModel();

		// 餐厅 ID  跟句餐厅
		$id = $_GET['id'];
		$sql = "select *from foods where pid = $id";

		$arrs = $mod->fetchAll($sql);
		$this->smarty->assign("arrs",$arrs);
		$this->smarty->display("dining.html");
	}
}
