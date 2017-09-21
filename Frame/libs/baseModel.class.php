<?php 
namespace Frame\libs;
use Frame\vendor\PDOWrapper;

// 基础模型控制器
class baseModel
{

	public $pdo;

	public function __construct()
	{
		return $this->pdo = new PDOWrapper();
	}

	public function exec($sql='')
	{
		return $this->pdo->exec($sql);
	}

	public function fetchOne($sql='')
	{
		return $this->pdo->fetchOne($sql);
	}

	public function fetchAll($sql="")
	{
		return $this->pdo->fetchAll($sql);
	}

	public function rowCount($sql='')
	{
		return $this->pdo->rowCount($sql);
	}

}