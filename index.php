<?php

define('BASE_URL_PATH', '/');

require_once __DIR__ . '/src/functions.php';
require_once __DIR__. '/libraries/Psr4AutoloaderClass.php';

$loader = new Psr4AutoloaderClass();
$loader->register();


$loader->addNamespace('App', __DIR__ .'/src');


try {
    $PDO = (new App\PDOFactory)->create([
        'dbhost' => 'localhost',
        'dbname' => 'libraryproject',
        'dbuser' => 'root',
        'dbpass' => ''
    ]);
}
catch (Exception $ex) {
    echo 'Không Thể kết nối đến MySQL, kiểm tra lại username/passowrd đến MySQL .<br>';
    exit("<pre>${ex}</pre>");
}

?>
