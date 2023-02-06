<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'config.php';

use Chahal26\PhpSimpleRouter\Router;

/* Creating Route Instance */
$router = new Router();
$router->setNamespace('\App\Controllers');
/* Defining Routes */
$router->get('/', function (){
    echo "Welcome to Home Page";
});
$router->get('/about', 'PagesController@about');
$router->get('/privacy', 'PagesController@privacy');

//Auth Routes
$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@registerPost');
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@loginPost');

//Profile Routes
$router->get('/profile', 'ProfileController@profile');
$router->get('/logout', 'ProfileController@logout');

/* Execute Routes */
require_once "resources/views/layouts/header.php";
$router->run();
require_once "resources/views/layouts/footer.php";