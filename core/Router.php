<?php 
require 'controllers/PagesController.php';

class Router{
	protected $routes = [
		'GET' => [],
		'POST' => []
	];

	public static function load($file){
		$router = new static;

		require $file;

		return $router;
	}

	public function define($routes){
		$this->routes = $routes;
	}

	public function get($uri, $controller){
		$this->routes['GET'][$uri] = $controller;
	}

	public function post($uri, $controller){
		$this->routes['POST'][$uri] = $controller;
	}

	public function direct($uri, $method){
		if(isset($this->routes[$method]) && array_key_exists($uri, $this->routes[$method])){
			$temp = explode('@', $this->routes[$method][$uri]);
			return $this->callAction($temp[0], $temp[1]);
		}

		throw new Exception('No route defined for this URI/method');
	}

	protected function callAction($controller, $action){
		if(!method_exists($controller, $action)){
			throw new Exception("{$controller} does not respond to the {$action} action");
		}

		return (new $controller)->$action();
	}

}

?>