<?php
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="border-bottom position-relative" style="margin-bottom: -1px;">
            <div class="container-fluid px-5 ">
                <div class="d-flex align-items-center position-relative flex-wrap">
                    <div class="nav-brand px-5">
                        <a href="/" class="d-block mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="120px" height="90px"
                                viewBox="0 0 450.000000 128.000000" preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,128.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path
                                        d="M0 640 l0 -640 680 0 680 0 0 640 0 640 -680 0 -680 0 0 -640z m805 432 c99 -46 145 -113 145 -213 0 -73 -19 -119 -68 -159 l-35 -28 51 -26 c152 -77 186 -243 75 -366 -75 -83 -115 -93 -385 -98 l-228 -4 0 462 0 462 198 -4 c181 -3 201 -5 247 -26z" />
                                    <path
                                        d="M520 840 l0 -120 68 0 c137 0 192 36 192 125 0 85 -49 114 -192 115 l-68 0 0 -120z" />
                                    <path
                                        d="M520 445 l0 -125 90 0 c163 0 242 33 256 107 10 52 -16 100 -69 123 -34 16 -65 20 -159 20 l-118 0 0 -125z" />
                                    <path
                                        d="M1570 640 l0 -640 680 0 680 0 0 640 0 640 -680 0 -680 0 0 -640z m805 432 c98 -45 144 -114 145 -215 0 -68 -24 -123 -71 -160 l-32 -25 44 -22 c96 -48 143 -119 143 -215 0 -100 -63 -187 -164 -227 -50 -20 -77 -23 -282 -26 l-228 -4 0 462 0 462 198 -4 c181 -3 201 -5 247 -26z" />
                                    <path
                                        d="M2090 840 l0 -120 68 0 c135 0 192 36 192 120 0 87 -54 120 -194 120 l-66 0 0 -120z" />
                                    <path
                                        d="M2090 445 l0 -125 90 0 c163 0 242 33 256 107 10 52 -16 100 -69 123 -34 16 -65 20 -159 20 l-118 0 0 -125z" />
                                    <path
                                        d="M3140 640 l0 -640 680 0 680 0 0 640 0 640 -680 0 -680 0 0 -640z m890 455 c36 -9 93 -25 128 -37 l62 -22 0 -83 c0 -46 -2 -83 -5 -83 -3 0 -25 10 -47 21 -159 81 -341 95 -466 37 -70 -33 -145 -112 -168 -178 -54 -160 14 -328 161 -396 133 -62 335 -44 481 41 23 14 45 25 48 25 3 0 6 -38 6 -85 l0 -86 -45 -19 c-91 -39 -152 -52 -270 -57 -195 -8 -325 35 -436 146 -141 141 -173 336 -84 517 61 124 188 223 331 258 78 19 224 19 304 1z" />
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="nav-navigator me-auto">
                        <ul class="nav">
                            <li class="nav-item text-center" style="width: 130px;">
                                <a class="nav-link text-dark mx-4 px-0 py-5 fw-medium border-bottom border-danger border-2"
                                    aria-current="page" href="/">Trang chủ</a>
                            </li>
                            <?php 
                                if(isset($_SESSION['user'])) 
                                    echo    '<li class="nav-item text-center" style="width: 130px;">
                                                <a class="nav-link text-dark mx-4 px-0 py-5 fw-medium border-bottom border-danger border-2" aria-current="page" href="/logout">Đăng Xuất</a>
                                            </li>'; 
                                else 
                                echo    '<li class="nav-item text-center" style="width: 130px;">
                                            <a class="nav-link text-dark mx-4 px-0 py-5 fw-medium border-bottom border-danger border-2" aria-current="page" href="login">Đặng nhập</a>
                                        </li>'?>
                            <li class="nav-item text-center" style="width: 130px;">
                                <a class="nav-link text-dark mx-4 px-0 py-5 fw-medium border-bottom border-danger border-2"
                                    aria-current="page" href="manage">Quản lí</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-search">
                        <form class="form-inline" role="search" method="get" id="search-form">
                            <div class="input-group">
                                <div class="d-flex" style="margin-right: -1px;">
                                    <i
                                        class="fa-solid fa-magnifying-glass input-group-text pb-2d75 bg-light border-light pt-3"></i>
                                </div>
                                <input class="form-control bg-light  py-2d75 border-light" type="search" name="search"
                                    placeholder="Nhập từ khóa" aria-label="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if(isset($_SESSION['user'])) echo 'Xin Chào ' . $_SESSION['user'] ?>
    </header>

    <!-- BEGIN CHANGEABLE CONTENT. -->