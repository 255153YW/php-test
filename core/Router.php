<?php 
require 'controllers/PagesController.php';
require 'controllers/CRUDController.php';

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

	public function get($uri, $controller){
		$this->routes['GET'][$uri] = $controller;
	}

	public function post($uri, $controller){
		$this->routes['POST'][$uri] = $controller;
	}

	public function direct($uri, $method){
		$uri = urldecode($uri);

		$param = $this->getUriParam($uri);

		$uri = $this->checkForParam($uri);
		
		if(isset($this->routes[$method]) && array_key_exists($uri, $this->routes[$method])){
			$temp = explode('@', $this->routes[$method][$uri]);
			return $this->callAction($temp[0], $temp[1], $param);
		}

		throw new Exception('No route defined for this URI/method');
	}

	protected function callAction($controller, $action, $param=false){
		if(!method_exists($controller, $action)){
			throw new Exception("{$controller} does not respond to the {$action} action");
		}

		if($param){
			return (new $controller)->$action($param);
		}

		return (new $controller)->$action();
	}

	protected function checkForParam($uri){
		$temp = $uri;

		if(strpos($uri, '{') >= 0 && strpos($uri, '}') >= 0){

			$uri =  substr($uri, 0, strpos($uri, '{'));
		}

		if($uri){
			return $uri;
		}
		else{
			return $temp;
		}
		
	}

	protected function getUriParam($uri){
		if(strpos($uri, '{')  >= 0 && strpos($uri, '}')  >= 0){
			$temp = substr($uri, strpos($uri, '{'), strpos($uri, '}'));
			if($temp){
				return trim(trim($temp,'{'),'}');
			}
			
		}
		return false;
	}

}

?>