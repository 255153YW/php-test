<?php

class CRUDController extends PagesController {
	private $query;
	function __construct(){
		parent::__construct();
		$this->query = new QueryBuilder(Connection::make());
	}

    public function login(){
		$hash = $this->query->getEmployee($_POST['username'])[0]->password;
		if (password_verify($_POST['password'], $hash)) {
			$_SESSION["username"]=$_POST['username'];
			parent::home();
		}
		else{
			parent::login();
		}
	}
}
?>
