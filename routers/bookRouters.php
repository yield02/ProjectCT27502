<?php 
   
    
$router->get('book/searchTitle/{title}', function($title) {
    global $PDO;
    $book = new App\Models\Book($PDO);
    $books = array();
    $books = $book->searchTitle($title);
    echo json_encode($books, JSON_UNESCAPED_UNICODE);
});


$router->get('book/{id}', function($id) {
    global $PDO;
    $book = new App\Models\Book($PDO);
    echo json_encode($book->findBook($id), JSON_UNESCAPED_UNICODE);
});



?>
