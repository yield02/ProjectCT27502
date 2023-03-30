<?php 

include __DIR__.'/../../bootstrap.php';

use App\Models\Book;
use App\Models\Category;



$book = new Book($PDO);
$books = $book->getAll();

$page = 'manage';

require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';
require_once __DIR__ . '/../components/check_admin.php';
?>

<div id="content">
    <!-- Main Page Content -->
    <div class="container">
        <section id="inner" class="inner-section section">
            <!-- SECTION HEADING -->
            <h2 class="mt-5 text-center animated fadeIn">Quản lý sách</h2>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <p class="animated fadeIn">Xem tất cả sách ở đây.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <a href="<?= BASE_URL_PATH . 'add.php' ?>" class="btn btn-primary" style="margin-bottom: 30px;">
                        <i class="fa fa-plus"></i> Thêm sách mới</a>

                    <!-- Table Starts Here -->
                    <table id="contacts" class="table table-bordered table-responsive table-striped">
                        <thead class="text-center">
                            <tr>
                                <th class="pb-4">Tiêu đề</th>
                                <th class="pb-4">Tác giả</th>
                                <th class="pb-4">Nhà xuất bản</th>
                                <th class="pb-3">Ngày xuất bản</th>
                                <th class="pb-4">ISBN</th>
                                <th class="pb-3">Số lượng</th>
                                <th class="pb-3">Mã thể loại</th>
                                <th class="pb-4">Mô tả</th>
                                <th class="pb-3">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($books as $book): ?>
                                <?php 
                                        $category = new Category($PDO);
                                ?>
                            <tr>
                                <td><?=$book->getTitle()?></td>
                                <td><?=$book->getAuthor()?></td>
                                <td><?=$book->getPublisher()?></td>
                                <td><?=date("d-m-Y", strtotime($book->getPublishDate()))?></td>
                                <td><?=$book->getISBN()?></td>
                                <td class="text-center"><?=$book->getQuantity()?></td>
                                <td class="text-center" width="6%"><?=$category->getCategoryNameFromID($book->getCategoryID())?></td>
                                <td><?=$book->getDescription()?></td>
                                <td>
                                    <a href="<?=BASE_URL_PATH . 'edit.php?id=' . $book->getID()?>"
                                        class="btn btn-warning"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Edit" class="fa-solid fa-pencil"></i> Sửa</a>
                                    <form class="delete" action="<?=BASE_URL_PATH . 'delete.php'?>" method="POST"
                                        style="display: inline;">
                                        <input type="hidden" name="id" value="<?=$book->getID()?>">
                                        <button type="submit" class="btn btn-sm btn-danger" name="delete-contact"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                            <i alt="Delete" class="fa-solid fa-trash"> </i> Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <div id="delete-confirm" class="modal fade" role="dialog">"
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confirmation</h4>
                                    </div>

                                    <div class="modal-body">Do you want to delete this contact?</div>

                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-danger"
                                            id="delete">Delete</button>
                                        <button type="button" data-dismiss="modal"
                                            class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </table>
                    <!-- Table Ends Here -->
                </div>
            </div>
        </section>
    </div>

</div>
<script>
// $(document).ready(function() {
//     new WOW().init();
//     $('#contacts').DataTable();
//     $('button[name="delete-contact"]').on('click', function(e) {
//         e.preventDefault();
//         const form = $(this).closest('form');
//         const nameTd = $(this).closest('tr').find('td:first');
//         if (nameTd.length > 0) {
//             $('.modal-body').html(
//                 `Do you want to delete "${nameTd.text()}"?`
//             );
//         }
//         $('#delete-confirm').modal({
//                 backdrop: 'static',
//                 keyboard: false
//             })
//             .one('click', '#delete', function() {
//                 form.trigger('submit');
//             });
//     });
// });
</script>

<?php 

require_once __DIR__ . '/../components/footer.php';

?>