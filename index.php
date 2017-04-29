<?php
/**
 * Entry point of the application; 
 */

	//Load stuff from 'core/bootstrap.php'
	require 'core/bootstrap.php';
	
	try {
    //load list of routes from 'routes.php' and direct user to the right controller based on the request uri/method 
	Router::load('routes.php')->direct(Request::uri(), Request::method());
	} catch (Exception $e) {
		echo var_dump(Request::uri(), Request::method());
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
?>