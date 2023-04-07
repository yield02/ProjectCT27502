<?php 

include __DIR__.'/../../bootstrap.php';

use App\Models\Book;
use App\Models\BorrowDetail;
use App\Models\BorrowTicket;


$BorrowTicket = new BorrowTicket($PDO);
$BorrowTicket->getCart($_SESSION['user']);

$BorrowDetail = new BorrowDetail($PDO);

$BorrowDetails = $BorrowDetail->getBorrowDetailFromBorrowID($BorrowTicket->getBorrowID());

$book = new Book($PDO);

$page = 'cart';

require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';
require_once __DIR__ . '/../components/check_admin.php';
?>

<div id="cart">
    <!-- Main Page Content -->
    <div class="container">
        <section id="inner" class="inner-section section">
            <!-- SECTION HEADING -->
            <h2 class="mt-5 text-center animated fadeIn">GIỎ HÀNG</h2>
            <div class="row mb-5">
                <div class="d-flex justify-content-center">
                    <p class="animated fadeIn">Xem tất cả sách ở đây.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Table Starts Here -->
                    <table id="contacts" class="table table-bordered table-responsive table-striped">
                        <thead class="text-center">
                            <tr>
                                <th class="align-middle">Tiêu đề</th>
                                <th class="align-middle">Tác giả</th>
                                <th class="align-middle">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="cartShow">
                            <?php foreach($BorrowDetails as $BorrowDetail): ?>
                            <tr id="rowCart<?=$BorrowDetail->BorrowDetailID()?>">
                                <td width="20%"><?=$book->findBook($BorrowDetail->getBookID())->getTitle()?></td>
                                <td><?=$book->findBook($BorrowDetail->getBookID())->getAuthor()?></td>
                                <td class="align-middle" width="5%">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#Cart<?=$BorrowDetail->BorrowDetailID()?>"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Delete" class="fa-solid fa-trash"></i> Xóa
                                    </button>

                                    <div class="modal fade" id="Cart<?=$BorrowDetail->BorrowDetailID()?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="button" onClick="deleteCart(<?=$BorrowDetail->BorrowDetailID()?>, <?= $BorrowTicket->getBorrowID()?>)"
                                                        class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-info">Tạo phiếu</button>
            </div>
        </section>
    </div>
</div>

<?php 

require_once __DIR__ . '/../components/footer.php';

?>