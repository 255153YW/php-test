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

	public function isValidUserSession(){
		if($_SESSION["username"]){
			return true;
		}
		return false;
	}

	public function isValidManagerSession(){
		if($_SESSION["username"]==='manager'){
			return true;
		}
		return false;
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

	public function login(){
		$title="Login";
		$page="login";
		
		require 'views/login.view.php';
	}

	public function logout(){
		session_unset();
		session_destroy();
		$this->login();
	}
}
?>