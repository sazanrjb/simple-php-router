<?php

use App\Core\Router;

$router = new Router();

$router->register('/', 'HomeController@index');
$router->register('home', 'HomeController@index');
$router->register('about', 'AboutController@index');

$router->fire($_SERVER['REQUEST_URI']);