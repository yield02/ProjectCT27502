<?php 

include __DIR__.'/../../bootstrap.php';

use App\Models\Book;
use App\Models\User;


$book = new Book($PDO);
$books = $book->getAll();

$user = new User($PDO);
$users = $user->getUserID;

$page = 'borrowUser';

require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';
require_once __DIR__ . '/../components/check_admin.php';
?>

<div id="book">
    <!-- Main Page Content -->
    <div class="container">
        <section id="inner" class="inner-section section">
            <!-- SECTION HEADING -->
            <h2 class="mt-5 text-center animated fadeIn">Quản lý sách</h2>
            <div class="row mb-5">
                <div class="d-flex justify-content-center">
                    <p class="animated fadeIn">Xem tất cả sách ở đây.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <a href="/add" class="btn btn-primary" style="margin-bottom: 30px;">
                        <i class="fa fa-plus"></i> Thêm sách mới</a>

                    <form id="SearchBook">

                        <lable>
                            Tìm kiếm Tiêu đề
                        </lable>

                        <input name="book" placeholder="Nhập tiêu đề sách" onInput="SearchBook(this.value)" />

                    </form>
                    <!-- Table Starts Here -->
                    <table id="contacts" class="table table-bordered table-responsive table-striped">
                        <thead class="text-center">
                            <tr>
                                <th class="align-middle">Tiêu đề</th>
                                <th class="align-middle">Tác giả</th>
                                <th class="align-middle">Nhà xuất bản</th>
                                <th class="align-middle">Ngày xuất bản</th>
                                <th class="align-middle">Thể loại</th>
                                <th class="align-middle">Mô tả</th>
                                <th class="align-middle">Số lượng</th>
                                <th class="align-middle">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="showBook">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>




<?php 

require_once __DIR__ . '/../components/footer.php';

?>