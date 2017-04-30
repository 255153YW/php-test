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

	public function getEmployee($value, $column){

		$statement = $this->pdo->prepare("select * from employees where {$column} = '{$value}'");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, 'Employee');
	}

	public function updateEmployee(Employee $employee, $condition, $conditionColumn){
		$query = "update employees set";

		$employeeAsArray =  (array) $employee;

		foreach(array_keys($employeeAsArray) as $key) {
			if(isset($employeeAsArray[$key]) && $key != 'id'){
				$query .= " {$key} = '{$employeeAsArray[$key]}',";
			}
		}

		$query = rtrim($query,",");
		$query .=" where {$conditionColumn} = '{$condition}'";

		$statement = $this->pdo->prepare($query);

		$statement->execute();
	}

	public function addEmployee(Employee $employee){
		$query = "insert into employees (";
		$queryValues = " values (";

		$employeeAsArray =  (array) $employee;

		foreach(array_keys($employeeAsArray) as $key) {
			if(isset($employeeAsArray[$key]) && $key != 'id'){
				$query .= " {$key},";
				$queryValues .= "'{$employeeAsArray[$key]}',";
			}
		}
		$query = rtrim($query,",");
		$query .= ")";
		$queryValues = rtrim($queryValues,",");
		$queryValues .= ")";
		
		$query .= $queryValues;

		$statement = $this->pdo->prepare($query);

		$statement->execute();

	}

	public function deleteEmployee($value, $column){

		$statement = $this->pdo->prepare("delete from employees where {$column} = '{$value}'");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, 'Employee');
	}
}

?>