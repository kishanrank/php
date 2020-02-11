<?php 

require '../App/Controllers/Posts.php';

require '../Core/Router.php';

require '../App/Controllers/Home.php';

$router = new Router();

$router->add('', ['controller'=>'Home', 'action'=>'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

echo "<pre>";
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo "</pre>";

$router->dispatch($_SERVER['QUERY_STRING']);
/*
$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
    echo "<pre>";
    var_dump($router->getParams());
    echo "</pre>";
} else {
    echo "No route found for URL '$url'";
}
*/

?>