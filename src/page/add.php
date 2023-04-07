<?php 

include __DIR__.'/../../bootstrap.php';

use App\Models\Book;
use App\Models\Category;
use App\Models\User;


$category = new Category($PDO);

$categories = $category->getAll();



$page = 'add';

require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';
require_once __DIR__ . '/../components/check_admin.php';
?>

<!-- <div>
    <h6>Thêm sách</h6> -->

    <!-- <form id="bookAdd" enctype="multipart/form-data">
        <lable>Tiêu đề sách</lable><input type="text" name="Title" id="bTitle" />
        <br>
        <lable>Tác giả</lable><input type="text" name="Author" id="Author" />
        <br>
        <lable>Nhà xuất bản</lable><input type="text" name="Publisher" id="Publisher" />
        <br>
        <lable>Ngày xuất bản</lable><input type="date" name="PublishDate" id="PublishDate" />
        <br>
        <lable>Mã ISBN</lable><input type="text" name="ISBN" id="ISBN" />
        <br>
        <lable>Số lượng</lable><input type="number" name="Quantity" id="Quantity" />
        <br>
        <lable>Thể loại</lable>
        <select id="CategoryID" name="CategoryID" aria-label="Default select example">
            < ?php foreach($categories as $category): ?>
            <option value="< ?php echo $category->getCategoryID()?>">< ?php echo $category->getCategoryName()?></option>
            < ?php endforeach ?>
        </select>
        <br>
        <lable>Mô tả</lable><textarea id="bDescription" name="Description" rows="4" cols="50"></textarea>
        <br>
        <input id="img" type="file" name="Img">
        <br>
        <button>Thêm sách<button>
    </form>
    <div id="bResult"></div>
</div> -->

<!-- <div>
    <h6>Thêm Thể Loại Sách</h6>
    <form id="categoryAdd">
        <lable>Tên thể loại</lable><input type="text" name="CategoryName" id="CategoryName" />
        <br>
        <lable>Mô tả</lable><input type="text" name="cDescription" id="cDescription" />
        <br>
        <button>Thêm thể loại<button>
    </form>
    <div id="cResult"></div>
</div> -->

<div id="add">
    <div class="container" style="height: 55rem;">
        <h2 class="my-5 text-center animated fadeIn">Thêm sách và thể loại</h2>
        <div class="row mb-5">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Thêm sách
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form id="bookAdd" enctype="multipart/form-data">
                                <div class="mb-3 row">
                                    <label for="bTitle" class="col-3 col-form-label"><strong>Tiêu đề sách:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="Title" id="bTitle" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Author" class="col-3 col-form-label"><strong>Tác giả:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="Author" id="Author" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Publisher" class="col-3 col-form-label"><strong>Nhà xuất bản:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="Publisher" id="Publisher" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="PublishDate" class="col-3 col-form-label"><strong>Ngày xuất bản:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="date" name="PublishDate" id="PublishDate" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="ISBN" class="col-3 col-form-label"><strong>Mã ISBN:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="ISBN" id="ISBN" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Quantity" class="col-3 col-form-label"><strong>Số lượng:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="number" name="Quantity" id="Quantity"  min="1" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="CategoryID" class="col-3 col-form-label"><strong>Thể loại:
                                        </strong></label>
                                    <div class="col-6">
                                        <select id="CategoryID" class="form-select" name="CategoryID"
                                            aria-label="Default select example" required>
                                            <option value="">--- Thể loại ---</option>
                                            <?php foreach($categories as $category): ?>
                                            <option value="<?php echo $category->getCategoryID()?>">
                                                <?php echo $category->getCategoryName()?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="bDescription" class="col-3 col-form-label"><strong>Mô tả:
                                        </strong></label>
                                    <div class="col-6">
                                        <textarea id="bDescription" class="form-control" name="Description" rows="4"
                                            cols="50" placeholder="Nhập mô tả..." required></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="img" class="col-3 col-form-label" required><strong>Bìa sách:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" id="img" type="file" name="Img">
                                    </div>
                                </div>
                                <div class="my-3 row">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary mb-3 w-25"><i class="fa-solid fa-plus"></i> Thêm </button>
                                    </div>
                                </div>
                            </form>
                            <div id="bResult"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Thêm thể loại sách
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form class="categoryAdd" id="categoryAdd">
                                <div class="mb-3 row">
                                    <label for="CategoryName" class="col-3 col-form-label"><strong>Tên thể loại:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="CategoryName" id="CategoryName" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="cDescription" class="col-3 col-form-label">
                                        <strong>Mô tả: </strong></label>
                                    <div class="col-6">
                                    <textarea id="cDescription" class="form-control" name="cDescription" rows="4"
                                            cols="50" placeholder="Nhập mô tả..." required></textarea>
                                    </div>
                                </div>
                                <div class="my-3 row">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary mb-3 w-25"><i class="fa-solid fa-plus"></i> Thêm</button>
                                    </div>
                                </div>
                            </form>
                            <div id="cResult"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

require_once __DIR__ . '/../components/footer.php';

?>