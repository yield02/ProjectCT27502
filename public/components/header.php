<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="css/style.css">
    <title>
        <?php
	if (defined('TITLE')) {
		echo TITLE;
	} else {
		echo 'Trang các Trích dẫn';
	}
	?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./assets/css/main.css">
    <script src="./assets/js/jquery-3.6.3.min.js"></script>
    
    <?php 
        include __DIR__. '/ajax.php';
    ?>
</head>
<body>

    <header>Header</header>
    <nav>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="login.php">About</a></li>
			<li><a href="manage.php">Contact</a></li>
		</ul>
	</nav>
    <!-- BEGIN CHANGEABLE CONTENT. -->   

