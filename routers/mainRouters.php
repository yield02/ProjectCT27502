<?php

 
$router->get('/','App\PageController@index');


$router->get('/manage', function() {
    require __DIR__.'/../src/page/manage.php';
   
});

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


$router->get('/assets/img/{id}', function ($filename) {
    $path = __DIR__ . '/img/' . $id;
    if (file_exists($path)) {
        $type = mime_content_type($path);
        header('Content-Type: ' . $type);
        readfile($path);
    } else {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo 'File not found.';
    }
});