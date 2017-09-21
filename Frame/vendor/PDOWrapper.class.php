<?php 
namespace Frame\vendor;
use \PDO;
use \PDOException;	
// 使用异常捕获 一定要设置 setAttribute 和 引入 捕获异常类 因为设置了 命名空间所以要引入

class PDOWrapper{

	private $db_type;
	private $db_host;
	private $db_port;
	private $db_user;
	private $db_pass;
	private $db_name;
	private $charset;

	public $pdo = null;

	public function __construct(){

		$this->db_type = $GLOBALS['config']['db_type'];
		$this->db_host = $GLOBALS['config']['db_host'];
		$this->db_port = $GLOBALS['config']['db_port'];
		$this->db_user = $GLOBALS['config']['db_user'];
		$this->db_pass = $GLOBALS['config']['db_pass'];
		$this->db_name = $GLOBALS['config']['db_name'];
		$this->charset = $GLOBALS['config']['charset'];

		$this->connectMySql();
		$this->setError();
	}

	private function connectMySql()
	{
		try {
			$dsn = "{$this->db_type}:dbname={$this->db_name};dbhost={$this->db_host};";
			$dsn .= "dbport={$this->db_port};charset={$this->charset}";
			$this->pdo= new PDO($dsn,$this->db_user,$this->db_pass);			
		} catch (PDOException $e) {
			$this->showErrorMessage($e);
		}
	}

	private function setError(){
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}

	// 增删改 sql 语句执行
	public function exec($sql='')
	{
		try {
			return $this->pdo->exec($sql);	//执行成功返回受影响行 失败返回false
		} catch (PDOException $e) {
			$this->showErrorMessage($e);
		}
	}

	public function fetchOne($sql='')
	{
		try {
			$smart = $this->pdo->query($sql);
			return $smart->fetch(PDO::FETCH_ASSOC); // FETCH_ASSOC 返回关联数组
		} catch (PDOException $e) {					// FETCH_NUM   返回索引数组
			$this->showErrorMessage($e);
		}
	}

	public function fetchAll($sql="")
	{
		try {
			$smart = $this->pdo->query($sql);
			return $smart->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$this->showErrorMessage($e);
		}
	}

	// 返回行行素
	public function rowCount($sql='')
	{
		try {	
			$smart = $this->pdo->query($sql);
			require $smart->rowCount();;
		} catch (PDOException $e) {
					
		}
	}

	public function showErrorMessage($e){
		echo "<h2>SQL 语句错误</h2>";
		echo "错误信息:".$e->getMessage(),"<br>";
		echo "错误代码:".$e->getCode(),"<br>";
		echo "错误文件 : ".$e->getFile(),"<br>";
		echo "错误行号:".$e->getLine(),"<br>";
		die();
	}


}
