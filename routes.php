<?php
/**
 * Define association between request uri/method to the correct controller files
 */

$router->get('', 'PagesController@home');

$router->get('about', 'PagesController@about');

$router->get('contact', 'PagesController@contact');

$router->get('login', 'PagesController@login');

$router->get('loggedOut', 'PagesController@logout');

$router->get('employees', 'PagesController@showEmployees');

$router->get('update/self', 'PagesController@showSelfProfile');

$router->get('add/overtime', 'PagesController@showOvertimes');


$router->post('login', 'CRUDController@login');

$router->post('add/overtime', 'CRUDController@addOvertime');

$router->post('update/overtime', 'CRUDController@updateOvertime');

$router->post('delete/overtime', 'CRUDController@deleteOvertime');


$router->post('update/self', 'update-profile.php');

$router->get('add/employee', 'add-employee.php');

$router->post('add/employee', 'add-employee.php');

$router->post('update/employee', 'add-employee.php');

$router->post('delete/employee', 'add-employee.php');

?>