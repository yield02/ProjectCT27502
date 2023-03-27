<?php 
$router->get('/login', 'App\PageController@login');

$router->post('/login', 'App\PageController@checkLogin');

$router->get('/logout', 'App\PageController@logout');


$router->get('/register', 'App\PageController@register');

$router->post('/register', 'App\PageController@createUser');
