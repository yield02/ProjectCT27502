<?php

include '../../index.php';

use App\Book;

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $book = new Book($PDO);
    $books = array();
    $books = $book->searchTitle($search);
}


echo json_encode($books, JSON_UNESCAPED_UNICODE);

?>