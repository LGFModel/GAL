<?php 
namespace Admin\controller;

use \Frame\libs\baseController;
use Admin\model\indexModel;


class indexController extends baseController{

	function index(){

		$mod = new indexModel();
		$arr = $mod->fetchAll("select *from dining");

		$this->smarty->assign("arrs",$arr);
		$this->smarty->display("index.html");
		
	}	

}