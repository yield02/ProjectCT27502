<?php 
define('ROOT_DIR', realpath(dirname(__DIR__)));

include __DIR__. '/../bootstrap.php';
require __DIR__ .'/../vendor/autoload.php';



if (session_status() === PHP_SESSION_NONE) {
	session_start();
}


$router = new \Bramus\Router\Router();




require __DIR__ .'/../routers/bookRouters.php';
require __DIR__ .'/../routers/mainRouters.php';
require __DIR__ .'/../routers/userRouters.php';



?>
<?php
    $router->run();
?>