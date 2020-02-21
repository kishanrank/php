<?php
/*
require '../App/Controllers/Posts.php';
require '../Core/Router.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';
*/
session_start();

require '../vendor/autoload.php';

/*
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});
*/

$router = new Core\Router();
$router->add('',['controller' => 'User', 'action' => 'register']);
$router->add('user/login',['controller' => 'User', 'action' => 'login']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

// echo "<pre>";
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo "</pre>";

$router->dispatch($_SERVER['QUERY_STRING']);
?>
