<?php
/**
 * Define association between request uri/method to the correct controller files
 */

$router->get('', 'PagesController@home');

$router->get('about', 'PagesController@about');

$router->get('contact', 'PagesController@contact');

$router->get('login', 'PagesController@login');

$router->get('loggedOut', 'PagesController@logout');

$router->post('login', 'CRUDController@login');

$router->get('employees', 'CRUDController@showEmployees');

$router->get('update/self', 'CRUDController@showSelfProfile');

$router->get('update/employee', 'CRUDController@showEditEmployee');

$router->post('update/employee', 'CRUDController@updateEmployee');

$router->get('delete/employee', 'CRUDController@deleteEmployee');

$router->post('update/self', 'CRUDController@updateSelfProfile');

$router->get('add/employee', 'CRUDController@showAddEmployee');

$router->post('add/employee', 'CRUDController@addEmployee');

?>