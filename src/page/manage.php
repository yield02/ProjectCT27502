<?php 

include __DIR__.'/../../bootstrap.php';

use App\Models\Book;
use App\Models\Category;
use App\Models\User;


$book = new Book($PDO);
$books = $book->getAll();

$category = new Category($PDO);
$categories = $category->getAll();

$user = new User($PDO);
$users = $user->getAll();

$page = 'manage';

require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';
require_once __DIR__ . '/../components/check_admin.php';
?>
<div id="nav-manager" class="container">
    <div class="row">
        <div class="dropdown mt-2 col-12">
            <button class="btn btn-info dropdown-toggle" type="button" aria-label="Toggle Dropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a id="book-btn" class="dropdown-item" href="#">Quản lý sách</a></li>
                <li><a id="category-btn" class=" dropdown-item" href="#">Quản lý thể loại</a></li>
                <li><a id="user-btn" class=" dropdown-item" href="#">Quản lý tài khoản</a></li>
            </ul>
        </div>
    </div>
</div>

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
                                <th class="align-middle">ISBN</th>
                                <th class="align-middle">Số lượng</th>
                                <th class="align-middle">Thể loại</th>
                                <th class="align-middle">Mô tả</th>
                                <th class="align-middle">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="showBook">
                            <?php foreach($books as $book): ?>
                            <tr id="rowBook<?=$book->getID()?>">
                                <td width="20%"><?=$book->getTitle()?></td>
                                <td><?=$book->getAuthor()?></td>
                                <td><?=$book->getPublisher()?></td>
                                <td width="8%"><?=date("d-m-Y", strtotime($book->getPublishDate()))?></td>
                                <td><?=$book->getISBN()?></td>
                                <td class="text-center"><?=$book->getQuantity()?></td>
                                <td width="9%"><?=$category->getCategoryNameFromID($book->getCategoryID())?></td>
                                <td><?=$book->getDescription()?></td>
                                <td class="align-middle" width="5%">


                                    <a href="<?=BASE_URL_PATH . 'editBook/' . $book->getID()?>"
                                        class="btn btn-warning"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Edit" class="fa-solid fa-pencil"></i> Sửa</a>

                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#book<?=$book->getID()?>"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Delete" class="fa-solid fa-trash"></i> Xóa
                                    </button>

                                    <div class="modal fade" id="book<?=$book->getID()?>" tabindex="-1"
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
                                                    <button type="button" onClick="deleteBook(<?=$book->getID()?>)"
                                                        class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tbody id="searchBook">
                        </tbody>
                        <!-- <div id="delete-confirm" class="modal fade" role="dialog">"
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confirmation</h4>
                                    </div>

                                    <div class="modal-body">Bạn có muốn xóa sách này?</div>

                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-danger"
                                            id="delete">Xóa</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-default">H</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </table>
                    <!-- Table Ends Here -->
                </div>
            </div>
        </section>
    </div>
</div>

<div id="category">
    <!-- Second Page Content -->
    <div class="container">
        <section id="inner" class="inner-section section">
            <!-- SECTION HEADING -->
            <h2 class="mt-5 text-center animated fadeIn">Quản lý thể loại</h2>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <p class="animated fadeIn">Xem tất cả thể loại ở đây.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <a href="/add" class="btn btn-primary" style="margin-bottom: 30px;">
                        <i class="fa fa-plus"></i> Thêm thể loại mới</a>

                    <form id="SearchCategory">
                        <lable>
                            Tìm kiếm Thể loại
                        </lable>

                        <input name="category" placeholder="Nhập tên thể loại" />

                    </form>

                    <!-- Table Starts Here -->
                    <table id="contacts" class="table table-bordered table-responsive table-striped">
                        <thead class="text-center">
                            <tr>
                                <th class="align-middle">Tên thể loại</th>
                                <th class="align-middle">Mô tả</th>
                                <th class="align-middle">Hành động</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($categories as $category): ?>
                            <tr id="rowCategory<?=$category->getCategoryID()?>">
                                <td width="20%"><?=$category->getCategoryName()?></td>
                                <td><?=$category->getCategoryDescription()?></td>
                                <td class="align-middle" width="5%">
                                    <a href="<?=BASE_URL_PATH . 'editCategory/' . $category->getCategoryID()?>"
                                        class="btn btn-warning"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Edit" class="fa-solid fa-pencil"></i> Sửa</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#category<?=$category->getCategoryID()?>"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Delete" class="fa-solid fa-trash"></i> Xóa
                                    </button>

                                    <div class="modal fade" id="category<?=$category->getCategoryID()?>" tabindex="-1"
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
                                                        data-bs-dismiss="modal">Đ</button>
                                                    <button type="button"
                                                        onClick="deleteCategory(<?=$category->getCategoryID()?>)"
                                                        class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <!-- <div id="delete-confirm" class="modal fade" role="dialog">"
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
                        </div> -->
                    </table>
                    <!-- Table Ends Here -->
                </div>
            </div>
        </section>
    </div>
</div>

<div id="user">
    <!-- Third Page Content -->
    <div class="container">
        <section id="inner" class="inner-section section">
            <!-- SECTION HEADING -->
            <h2 class="mt-5 text-center animated fadeIn">Quản lý tài khoản</h2>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <p class="animated fadeIn">Xem tất cả tài khoản ở đây.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <form id="SearchUser">
                        <lable>
                            Tìm người dùng
                        </lable>

                        <input name="user" placeholder="Nhập tên người dùng(username)" onInput="SearchUser(this.value)"/>

                    </form>

                    <!-- Table Starts Here -->
                    <table id="contacts" class="table table-bordered table-responsive table-striped">
                        <thead class="text-center">
                            <tr>
                                <th class="align-middle">Tài khoản</th>
                                <th class="align-middle">Email</th>
                                <th class="align-middle">Tên đầy đủ</th>
                                <th class="align-middle">Địa chỉ</th>
                                <th class="align-middle">Số điện thoại</th>
                                <th class="align-middle">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="userShow">
                            <?php foreach($users as $user): ?>
                            <tr id="rowUser<?=$user->getUserID()?>">
                                <td><?=$user->getUsername()?></td>
                                <td><?=$user->getEmail()?></td>
                                <td><?=$user->getFullname()?></td>
                                <td><?=$user->getAddress()?></td>
                                <td><?=$user->getPhone()?></td>
                                <td class="align-middle" width="5%">
                                    <a href="<?=BASE_URL_PATH . '/edit.php?id=' . $user->getUserID()?>"
                                        class="btn btn-warning"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Edit" class="fa-solid fa-pencil"></i> Sửa</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#User<?=$user->getUserID()?>"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Delete" class="fa-solid fa-trash"></i> Xóa
                                    </button>

                                    <div class="modal fade" id="User<?=$user->getUserID()?>" tabindex="-1"
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
                                                    <button type="button"
                                                        onClick="deleteUser(<?=$user->getUserID()?>)"
                                                        class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tbody id="searchUser">
                        </tbody>
                        <!-- <div id="delete-confirm" class="modal fade" role="dialog">"
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
                        </div> -->
                    </table>
                    <!-- Table Ends Here -->
                </div>
            </div>
        </section>
    </div>
</div>


<?php 

require_once __DIR__ . '/../components/footer.php';

?>