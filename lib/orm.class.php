<?php

if (file_exists(ROOT . DS . 'vendor' . DS . 'NotORM.php')) {
		require_once(ROOT . DS . 'vendor' . DS . 'NotORM.php');
}

class ORM
{
	public $db;

	public function connect($dsn, $username, $password)
	{
		$pdo = new PDO($dsn, $username, $password,
			[
				PDO::ATTR_PERSISTENT => true, //conexión persistente
				PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
			]);
		$this->db = new NotORM($pdo);
		$this->db->debug = true;
	}




}
