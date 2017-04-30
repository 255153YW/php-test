<?php
/**
* Configure database connection and create connection to the database with PDO
**/
class Connection{
	public static function make(){
		try{
			return new PDO('mysql:host=127.0.0.1;dbname=employee', 'root', '');
		} catch(PDOException $e){
			die(var_dump($e->getMessage()));
		}
	}
}
?>