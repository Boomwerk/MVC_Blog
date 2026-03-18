<?php
declare(strict_types=1);

require_once __DIR__ . '/src/core/Autoloader.php';

use Core\Autoloader;
use Core\Router;

Autoloader::register();

$router = new Router();


$router->get('/', 'Homecontroller@index');

$router->get("/login", "LoginController@index");
$router->get("/loginValidator", "LoginController@loginValidator");
$router->get("/register", "LoginController@register");
$router->get("/registerValidator", "LoginController@registerValidator");
$router->get("/forgotPassword", "LoginController@forgotPassword");

$router->get("/admin/dashboard", "AdminController@dashboard");



$router->dispatch($_SERVER["REQUEST_URI"]);