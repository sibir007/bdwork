<?php


namespace App;
include __DIR__ . '/DDLManagerInterface.php';


class DDLManager implements DDLManagerInterface 
{
		private $pdo;


// BEGIN (write your solution here)
		public function __construct($dsn, $user, $pass)
			{
			$this->pdo = new \PDO($dsn, $user, $pass, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
			}
		public function dropTable($name)
		{
			$this->pdo->exec("drop table $name");
		}
		public function createTable($table, array $params)
			{
				$sql_arr_kolumns_param = array_reduce(array_keys($params), function ($acc, $item) use ($params) {
				$acc[] = "$item $params[$item]";
				return $acc;
				}, []);
		$sql_str_kolumns_param = implode(", ", $sql_arr_kolumns_param);
		$sql = "CREATE TABLE $table ($sql_str_kolumns_param)";
		$this->pdo->exec($sql);
			}
// END


		public function getConnection()
			{
				return $this->pdo;
			}
		public function getAllFromTable($table)
		{
				return $this->pdo->query("select * from $table;");
		}
		public function addValueInTableUesers($id, $name)
		{
			$this->pdo->exec("insert into users (id, name) values ($id, '$name');");		
		}
}
