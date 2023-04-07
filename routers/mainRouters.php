<?php

 
$router->get('/','App\PageController@index');

$router->get('/add','App\PageController@addPage');

$router->get('/manage', 'App\PageController@manage');

$router->get('/editBook/{id}', 'App\PageController@editBook');

$router->get('/editCategory/{id}', 'App\PageController@editCategory');





$router->get('/assets/{type}/{file}', function ($type, $file) {
    $path = __DIR__ . '/../src/assets/'. $type .'/' . $file;
    if(file_exists($path) && $type == 'css') {
        header('Content-Type: text/css');
        include $path;
        // include __DIR__  . '/../src/assets/css/' . $file;
    }
    else if(file_exists($path) && $type == 'js') {
        header('Content-Type: application/javascript');
        include $path;

    }
    else if(file_exists($path) && $type == 'img'){
        $typeFile = mime_content_type($path);
        header('Content-Type: ' . $typeFile);
        readfile($path);
    }
    else {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo 'File not found.';
    }
    
});


