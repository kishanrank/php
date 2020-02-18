<?php
/*
require '../App/Controllers/Posts.php';
require '../Core/Router.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';
*/

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

set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();
$router->add('',['controller' => 'Home', 'action' => 'index', 'namespace' => 'User']);
$router->add('{urlkey:[a-zA-Z-]+}',['controller' => 'Home', 'action' => 'view', 'namespace' => 'User']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('{controller}/{action}/{id:\d+}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);
$router->add('{controller}/{action}/{urlkey:\w+}');
$router->add('User/{controller}/{action}', ['namespace' => 'User']);
$router->add('User/{controller}/{action}/{urlkey:\w+}', ['namespace' => 'User']);

// echo "<pre>";
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo "</pre>";

$router->dispatch($_SERVER['QUERY_STRING']);
?>
