<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
include __DIR__ . '/../../bootstrap.php';
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <header><nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="login">LOGIN</a></li>
			<li><a href="manage">manage</a></li>
		</ul>
	</nav></header>
    
    <!-- BEGIN CHANGEABLE CONTENT. -->   

