<?php
Class PagesController{

	function __construct(){
		//start session
		session_start();

		//check session last activity
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
		    // last request was more than 30 minutes ago
		    session_unset();     // unset $_SESSION variable for the run-time 
		    session_destroy();   // destroy session data in storage
		}

		// update last activity time stamp
		$_SESSION['LAST_ACTIVITY'] = time(); 
	}

	public function home(){
		$title="Home";
		$page="home";
		require 'views/index.view.php';
	}

	public function about(){
		$title="About";
		$page="about";
		require 'views/about.view.php';
	}

	public function contact(){
		$title="Contact";
		$page="contact";
		require 'views/contact.view.php';
	}

	public function showEmployees(){
		$title="Employees";
		require 'views/employees.view.php';
	}

	public function showOvertimes(){
		$title="Overtimes";
		require 'views/overtimes.view.php';
	}

	public function showSelfProfile(){
		$title="My Profile";
		require 'views/profile.view.php';
	}

	public function login(){
		$title="Login";
		$page="login";
		$_SESSION["username"]="john";
		require 'views/login.view.php';
	}

	public function logout(){
		session_unset();
		session_destroy();
		$this->home();
	}
}
?>