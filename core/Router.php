<?php 
/**
 * Router class; Direct uri to the right controller function, parameter is optional 
 */
require 'controllers/PagesController.php';
require 'controllers/CRUDController.php';

class Router{
	//hold routes and its destination controller/function
	protected $routes = [
		'GET' => [],
		'POST' => []
	];

	//used to call routes.php on index.php
	public static function load($file){
		$router = new static;

		require $file;

		return $router;
	}

	//put all uri with get method in the right portion of the $routes array
	public function get($uri, $controller){
		$this->routes['GET'][$uri] = $controller;
	}

	//put all uri with post method in the right portion of the $routes array
	public function post($uri, $controller){
		$this->routes['POST'][$uri] = $controller;
	}

	/**
	* direct a combination of request uri and method to the right controller/function
	* separate uri and its parameter
	* use the uri to get the routes
	* the routes contains the name of the controller class and its function separated with '@' 
	**/
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

	//actually creates new instance of controller and execute its function; params are optional
	protected function callAction($controller, $action, $param=false){
		if(!method_exists($controller, $action)){
			throw new Exception("{$controller} does not respond to the {$action} action");
		}

		if($param){
			return (new $controller)->$action($param);
		}

		return (new $controller)->$action();
	}

	//check if uri has parameter and return only the uri
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

	//get parameter within curly braces {} from request uri
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