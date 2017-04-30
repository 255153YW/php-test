<?php

class CRUDController extends PagesController {
	private $query;
	function __construct(){
		parent::__construct();
		$this->query = new QueryBuilder(Connection::make());
	}

    public function login(){
		$hash = $this->query->getEmployee($_POST['username'], 'username')[0]->password;
		if (password_verify($_POST['password'], $hash)) {
			$_SESSION["username"]=$_POST['username'];
			parent::home();
		}
		else{
			parent::login();
		}
	}

	public function showEmployees(){
		$title="Employees";
		if(parent::isValidUserSession()){
			$employees = $this->query->selectAllfrom('employees', 'Employee');
			require 'views/employees.view.php';
		}
		else{
			parent::login();
		}
		
	}

	public function showEditEmployee($id){
		$title="Update Employee";
		$action = "/update/employee{{$id}}";
		if(parent::isValidManagerSession()){
			$employee =  $this->query->getEmployee($id, 'id')[0];
			require 'views/employee-detail.view.php';
		}
		else{
			parent::login();
		}
	}

	public function showAddEmployee(){
		$title="Add New Employee";
		$action = "/add/employee";
		if(parent::isValidManagerSession()){
			$employee = new Employee();
			require 'views/employee-detail.view.php';
		}
		else{
			parent::login();
		}
	}

	public function addEmployee(){
		if(parent::isValidManagerSession()){
			$fallbackObject =  $this->query->getEmployee($_SESSION["username"], 'username')[0];
			$employee = $this->validatePostedEmployeeData($_POST, $fallbackObject);

			$this->query->addEmployee($employee);
			$this->showAddEmployee();
		}
		else{
			parent::login();
		}
	}

	public function deleteEmployee($id){
		if(parent::isValidManagerSession()){
			$this->query->deleteEmployee($id, 'id');
			$this->showEmployees();
		}
		else{
			parent::login();
		}
	}

	public function updateEmployee($id){
		if(parent::isValidManagerSession()){
			$fallbackObject =  $this->query->getEmployee($id, 'id')[0];
			$employee = $this->validatePostedEmployeeData($_POST, $fallbackObject);

			$this->query->updateEmployee($employee, $id, 'id');
			require 'views/employee-detail.view.php';
		}
		else{
			parent::login();
		}
	}

	public function showSelfProfile(){
		$title="My Profile";
		$action = "/update/self";
		if(parent::isValidUserSession()){
			$employee =  $this->query->getEmployee($_SESSION["username"], 'username')[0];
			require 'views/employee-detail.view.php';
		}
		else{
			parent::login();
		}
	}

	public function updateSelfProfile(){
		if(parent::isValidUserSession()){
			$fallbackObject =  $this->query->getEmployee($_SESSION["username"], 'username')[0];
			$employee = $this->validatePostedEmployeeData($_POST, $fallbackObject);

			$this->query->updateEmployee($employee, $fallbackObject->id, 'id')[0];
			$this->showSelfProfile();
		}
		else{
			parent::login();
		}
	}

	protected function validatePostedEmployeeData($posted, $fallback){
		$result = new Employee();
		try{
			foreach(array_keys($posted) as $key) {
				if(isset($posted[$key]) && !empty($posted[$key])){
					$value = $posted[$key];
					if($key == 'password'){
						$value = password_hash($value, PASSWORD_DEFAULT);
					}
					$result->$key = $value;
				}
			}	
		}catch (Exception $e) {
			echo var_dump(Request::uri(), Request::method());
		    echo 'Caught exception: ',  $e->getMessage(), "\n";
		    return $fallback;
		}
			
		return $result;
	}
}
?>
