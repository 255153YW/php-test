<?php
require 'models/database/Employee.php';

class QueryBuilder{
	protected $pdo;

	function __construct(PDO $pdo){
		$this->pdo = $pdo;
	}

	public function selectAllfrom($table, $asClass = NULL){
		$statement = $this->pdo->prepare("select * from {$table}");

		$statement->execute();

		if(isset($asClass)){
			return $statement->fetchAll(PDO::FETCH_CLASS, $asClass);
		}
		return $statement->fetchAll(PDO::FETCH_OBJECT);
	}

	public function getEmployee($username){

		$statement = $this->pdo->prepare("select * from employees where username = '{$username}'");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, Employee);
	}
}

?>