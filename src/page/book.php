<?php 

$page = 'book';

include __DIR__.'/../../bootstrap.php';
require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';

use App\Models\Book;



$book = new Book($PDO);

$book->findBook($id);

?>

<div id="content">
    <div id="book-info">
        <h1 class="py-5 text-center border-bottom m-0">Thông tin sách</h1>
        <div class="container">
            <div class="row">
                <div class="col-5 py-5">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/img/<?php echo $book->getID(); ?>.png" alt="" class="img-fluid "
                            style="max-width: 30rem; height: 30rem;">
                    </div>
                </div>
                <div class="col-7 border-start">
                    <div class="px-4 py-5">
                        <h2 class="h3 mb-3 fw-bold"><?php echo $book->getTitle(); ?></h2>
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-semibold">Ngày xuất bản:</span>
                            <span class="ms-2 fs-5"><?php echo $book->getPublishDate(); ?></span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-semibold">Nhà xuất bản:</span>
                            <span class="ms-2 text-danger fs-5"><?php echo $book->getPublisher(); ?></span>
                        </div>
                        <div class="d-flex flex-row mb-2 align-items-center">
                            <span class="fw-semibold">Được viết bởi tác giả:</span>
                            <span class="ms-2 text-secondary fs-bold fs-5"><?php echo $book->getAuthor(); ?></span>
                        </div>
                        <div class="flex-row mb-2 ">
                            <span class="fw-semibold">Số lượng còn lại:</span>
                            <span class="ms-2 text-secondary fs-bold fs-5"><?php echo $book->getQuantity(); ?></span>
                        </div>
                        <div class="my-4 py-3 border-top">
                            <p><?php echo $book->getDescription(); ?></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center border">
                                <a class="text-dark p-3" href="">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <input type="number" class="text-secondary text-center border-0 fs-4" min="1"
                                    style="width:2rem;">
                                <a class="text-dark py-3 pe-3" href="">
                                    <i class="fa-solid fa-minus"></i>
                                </a>
                            </div>
                            <button onclick="addCart(<?php echo $book->getID(); ?>)" class="btn btn-dark rounded-0 fs-6 ms-3" style="width:15rem; height: 4rem;">Thêm
                                vào giỏ
                                mượn</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>

<?php 

require_once __DIR__ . '/../components/footer.php';

?>