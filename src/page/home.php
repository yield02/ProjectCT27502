<?php

include __DIR__.'/../../bootstrap.php';

use App\Models\Book;
use App\Models\Category;



$book = new Book($PDO);
$books = $book->getAll();

$category = new Category($PDO);
$categories = $category->getAll();

$newestBooks = $book->getNewestBooks();
$newestBook = $book->getNewestBook();
$randomBooks = $book->getRandomBooks();

$page = 'home';

require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';

?>
<div id="content">

    <div id="Slider" class="mb-5 pb-5">
        <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators pb-4">
                <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="0"
                    class="slider-button mx-3 active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="1"
                    class="slider-button mx-3" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="2"
                    class="slider-button mx-3" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/img/slider-background1.jpg" class="background d-block w-100" alt="bookcover1">
                    <div class="carousel-caption row align-items-center" style="min-height: 40rem; min-width: 70rem;">
                        <div class="col-7 mb-4 p-0">
                            <div class="d-flex flex-column align-items-start">
                                <p class="pre-title text-uppercase fw-bold text-body-tertiary animated fadeInUp opacity-50 mb-2"
                                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">The BorrowBook
                                    Company'</p>
                                <h2 class="title animated fadeInUp d-flex flex-column align-items-start mb-4"
                                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="300" style="">
                                    <span class="fw-normal d-block">Sách tình cảm nổi bật của</span>
                                    <span class="fw-bold d-block">tháng 4</span>
                                </h2>
                                <button onclick="renderCategory(4, 'Tình cảm');" href="#"
                                    class="btn btn-dark btn-lg rounded-0 animated fadeInLeft"
                                    data-scs-animation-in="fadeInLeft" data-scs-animation-delay="400" tabindex="0"
                                    style="animation-delay: 400ms; opacity: 1; min-width: 2rem;">Xem thêm</button>
                            </div>
                        </div>
                        <div class="col-5 p-5 animated fadeInRight" data-scs-animation-in="fadeInRight"
                            data-scs-animation-delay="500" style="animation-delay: 500ms; opacity: 1;">
                            <img class="background-img" src="/assets/img/bookcover1.png" alt="image-description">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/assets/img/slider-background2.jpg" class="background d-block w-100" alt="bookcover2">
                    <div class="carousel-caption row align-items-center" style="min-height: 40rem; min-width: 70rem;">
                        <div class="col-7 mb-4 p-0">
                            <div class="d-flex flex-column align-items-start">
                                <p class="pre-title text-uppercase fw-bold text-body-tertiary animated fadeInUp opacity-50 mb-2"
                                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">The BorrowBook
                                    Company'</p>
                                <h2 class="title animated fadeInUp d-flex flex-column align-items-start mb-4"
                                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="300" style="">
                                    <span class="fw-normal d-block">Tiểu thuyết nổi bật của</span>
                                    <span class="fw-bold d-block">tháng 4</span>
                                </h2>
                                <button onclick="renderCategory(5, 'Tiểu thuyết');" href="#"
                                    class="btn btn-dark btn-lg rounded-0 animated fadeInLeft"
                                    data-scs-animation-in="fadeInLeft" data-scs-animation-delay="400" tabindex="0"
                                    style="animation-delay: 400ms; opacity: 1; min-width: 2rem;">Xem thêm</button>
                            </div>
                        </div>
                        <div class="col-5 p-5 animated fadeInRight" data-scs-animation-in="fadeInRight"
                            data-scs-animation-delay="500" style="animation-delay: 500ms; opacity: 1;">
                            <img class="background-img" src="/assets/img/bookcover2.png" alt="image-description">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/assets/img/slider-background3.jpg" class="background d-block w-100" alt="bookcover3">
                    <div class="carousel-caption row align-items-center" style="min-height: 40rem; min-width: 70rem;">
                        <div class="col-7 mb-4 p-0">
                            <div class="d-flex flex-column align-items-start">
                                <p class="pre-title text-uppercase fw-bold text-body-tertiary animated fadeInUp opacity-50 mb-2"
                                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">The BorrowBook
                                    Company'</p>
                                <h2 class="title animated fadeInUp d-flex flex-column align-items-start mb-4"
                                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="300" style="">
                                    <span class="fw-normal d-block">Truyện tranh nổi bật của</span>
                                    <span class="fw-bold d-block">tháng 4</span>
                                </h2>
                                <button onclick="renderCategory(7, 'Truyện tranh');" href="#"
                                    class="btn btn-dark btn-lg rounded-0 animated fadeInLeft"
                                    data-scs-animation-in="fadeInLeft" data-scs-animation-delay="400" tabindex="0"
                                    style="animation-delay: 400ms; opacity: 1; min-width: 2rem;">Xem thêm</button>
                            </div>
                        </div>
                        <div class="col-5 p-5 animated fadeInRight" data-scs-animation-in="fadeInRight"
                            data-scs-animation-delay="500" style="animation-delay: 500ms; opacity: 1;">
                            <img class="background-img" src="/assets/img/bookcover3.png" alt="image-description">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Categories" class="mb-5 pb-5">
        <div class="container">
            <header class="d-flex justify-content-start align-items-center mb-5 ">
                <h2 class="fs-1 mb-0">Danh mục nổi bật</h2>
            </header>


            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <?php 
                        $carouselIndex = 0; 
                        foreach ($categories as $category):
                            if ($carouselIndex % 4 === 0) {
                                if ($carouselIndex !== 0) { 
                                    echo '</ul>';
                                }
                                echo '<div class="carousel-item';
                                if ($carouselIndex === 0) { 
                                    echo ' active';
                                }
                                echo '"><ul class="row list-unstyled my-0">';
                            }
                        ?>
                    <li class="category col-3 mb-0"
                        onclick="renderCategory(<?php echo $category->getCategoryID()?>, '<?php echo $category->getCategoryName()?>');">
                        <div class="overflow-hidden">
                            <div class="category__inner bg-<?php echo $category->getColor__img(); ?> px-5 py-5">
                                <div class="category__icon fs-1 mb-3 mt-2">
                                    <i
                                        class="<?php echo $category->getCategoryImg(); ?> icon-<?php echo $category->getColor__img(); ?>"></i>
                                </div>
                                <div class="category__body">
                                    <h3 class="text-truncate fs-5"><?php echo $category->getCategoryName(); ?></h3>
                                    <a href="#" class="text-dark">Mượn ngay</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php 
                        $carouselIndex++;
                        if ($carouselIndex % 4 === 0 || $carouselIndex === count($categories)) { 
                            echo '</ul></div>';
                        }
                    endforeach; 
                    ?>
                </div>
                <button class="btn btn-lg position-absolute top-50 start-0"
                    style="transform: translate(-100%,-50%)!important;" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="btn btn-lg position-absolute top-50 start-100"
                    style="transform: translate(0%,-50%)!important;" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="Recommend" class="mb-5 pb-5">
        <div class="container">
            <header class="d-flex justify-content-start align-items-center mb-5 ">
                <h2 class="fs-1 mb-0">Đề xuất</h2>
            </header>
            <div class="row">
                <?php foreach($randomBooks as $book): ?>
                <div class="col-3 p-4 border border-secondary-subtle" style="width: 20%;">
                    <a href="/book/search/<?php echo $book->getID(); ?>" class="d-block"><img
                            src="/assets/img/<?php echo $book->getID(); ?>.png" alt="newbook"
                            class="img-fluid d-block mx-auto" style="max-width: 9rem; height: 9rem;"></a>
                    <div class="pt-2 bg-white">
                        <div class="text-uppercase fw-semibold mb-1 text-truncate ">
                            <a class="link-danger link-hover" href="book/search/<?php echo $book->getID(); ?>"
                                style="font-size: .75rem;"><?php echo $book->getPublisher(); ?></a>
                        </div>
                        <h5 class="h6 lh-base text-dark crop-text" style="height: 3rem;">
                            <a class="link-dark"
                                href="/book/search/<?php echo $book->getID(); ?>"><?php echo $book->getTitle(); ?></a>
                        </h5>
                        <div class="mb-2 text-truncate">
                            <a href="/book/search/<?php echo $book->getID(); ?>"
                                class="link-secondary link-hover"><?php echo $book->getAuthor(); ?></a>
                        </div>
                        <div class="d-flex justify-content-center fw-medium fs-5">
                            <button onclick="addCart(<?php echo $book->getID(); ?>)" href="#" class="btn btn-light rounded-3 px-4">Thêm vào giỏ mượn</button>
                        </div>
                    </div>
                </div>
                <?php endforeach;  ?>
            </div>
        </div>
    </div>

    <div id="New-release" class="mb-5 pb-5">
        <div class="container">
            <header class="d-flex justify-content-start align-items-center mb-5 ">
                <h2 class="fs-1 mb-0">Mới phát hành</h2>
            </header>
            <div class="row">
                <div class="col-4 border border-secondary-subtle p-0">
                    <div class="bg-chili px-5 d-flex align-items-center justify-content-center img-fluid"
                        style="height: 100%!important; width: 100%;">
                        <?php foreach ($newestBook as $book): ?>
                        <div class="banner__body text-center">
                            <div class="banner__image pb-1 mb-5">
                                <img src="/assets/img/<?php echo $book->getID(); ?>.png" alt="newestbook"
                                    class="img-fluid d-block mx-auto" style="max-width: 20rem; height: 20rem;">
                            </div>
                            <h3 class="banner_text m-0">
                                <span class="d-block mb-2 fw-normal" style="font-size: 1.5rem;">Mới nhất trong
                                    tuần</span>
                                <span class="d-block mb-4 text-danger fw-bold" style="font-size: 3rem;">Mượn
                                    ngay!</span>
                                <span
                                    class="d-block mb-5 text-uppercase fs-5 fw-normal text-body-tertiary opacity-75">Chỉ
                                    còn <?php echo $book->getQuantity(); ?> cuốn</span>
                            </h3>
                            <a href="/book/search/<?php echo $book->getID(); ?>"
                                class="btn btn-danger btn-lg rounded-0 px-5">Xem thêm</a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-8 row">
                    <?php foreach ($newestBooks as $book): ?>
                    <div class="col-4 p-4 border border-secondary-subtle">
                        <a href="/book/search/<?php echo $book->getID(); ?>" class="d-block"><img
                                src="/assets/img/<?php echo $book->getID(); ?>.png" alt="newbook"
                                class="img-fluid d-block mx-auto" style="max-width: 9rem; height: 9rem;"></a>
                        <div class="pt-2 bg-white">
                            <div class="text-uppercase fw-semibold mb-1 text-truncate ">
                                <a class="link-danger link-hover" href="/book/search/<?php echo $book->getID(); ?>"
                                    style="font-size: .75rem;"><?php echo $book->getPublisher(); ?></a>
                            </div>
                            <h5 class="h6 lh-base text-dark crop-text" style="height: 3rem;">
                                <a class="link-dark"
                                    href="/book/search/<?php echo $book->getID(); ?>"><?php echo $book->getTitle(); ?></a>
                            </h5>
                            <div class="mb-2 text-truncate">
                                <a href="/book/search/<?php echo $book->getID(); ?>"
                                    class="link-secondary link-hover"><?php echo $book->getAuthor(); ?></a>
                            </div>
                            <div class="d-flex justify-content-center fw-medium fs-5">
                                <button onclick="addCart(<?php echo $book->getID(); ?>)" href="#" class="btn btn-light rounded-3 px-4">Thêm vào giỏ mượn</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>


</div>

<div id="result" style="display: none;">

    <!-- search result -->

    <div class="container" style="max-width: 1430px;">
        <div id="search-result" class="row"></div>
        <div id="pagination" class="my-4 d-flex justify-content-center">
        </div>
    </div>

</div>

<div id="category-result" style="display: none;">

    <div class="container" style="max-width: 1430px;">
        <h1 id="header" class='d-flex justify-content-center align-items-center my-5'>
            <?php echo $category->getCategoryName(); ?></h1>
        <div class="row">
            <div class="col-3">
                <div class="p-4 border mx-3">
                    <h5 class="mb-3">Thể loại</h5>
                    <ul class="p-0">
                        <?php foreach ($categories as $category): ?>
                        <li class="mb-3 d-flex justify-content-start"
                            onclick="renderCategory(<?php echo $category->getCategoryID()?>, '<?php echo $category->getCategoryName()?>');">
                            <a href="#" class="text-dark"><?php echo $category->getCategoryName(); ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div id="c_result" class="col-9 row"></div>
            <div id="c_pagination" class="my-4 d-flex justify-content-center">
            </div>
        </div>
    </div>

</div>

<script src="/assets/js/home.js"></script>

<?php
require_once __DIR__ . '/../components/footer.php';
?>