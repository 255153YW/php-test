<?php
/**
* Convenience function to get certain part of the request uri
**/
class Request{
	public static function uri(){
		return trim($_SERVER['REQUEST_URI'],'/');
	}

	public static function method(){
		return $_SERVER['REQUEST_METHOD'];
	}
}
?>