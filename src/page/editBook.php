<?php 

$page = 'editBook';

include __DIR__.'/../../bootstrap.php';
require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';

use App\Models\Book;
use App\Models\Category;

$category = new Category($PDO);

$categories = $category->getAll();


$book = new Book($PDO);

$book->findBook($id);



?>

<div id="editBook">
    <div class="container">
    <div class="accordion-item">
                    <h2 class="accordion-header text-center m-4">
                        CHỈNH SỬA SÁCH
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form id="editBookForm" enctype="multipart/form-data">
                                <div class="mb-3 row">
                                    <label for="bTitle" class="col-3 col-form-label"><strong>Tiêu đề sách:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="bookID" id="bookID" hidden value="<?= $book->getID() ?>" required>

                                        <input class="form-control" type="text" name="Title" id="bTitle" value="<?= $book->getTitle() ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Author" class="col-3 col-form-label"><strong>Tác giả:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="Author" id="Author" value="<?= $book->getAuthor() ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Publisher" class="col-3 col-form-label"><strong>Nhà xuất bản:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="Publisher" id="Publisher" value="<?= $book->getPublisher() ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="PublishDate" class="col-3 col-form-label"><strong>Ngày xuất bản:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="date" name="PublishDate" id="PublishDate" value="<?= $book->getPublishDate() ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="ISBN" class="col-3 col-form-label"><strong>Mã ISBN:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="ISBN" id="ISBN" value="<?= $book->getISBN() ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Quantity" class="col-3 col-form-label"><strong>Số lượng:
                                        </strong></label>
                                    <div class="col-6">
                                        <input class="form-control" type="number" name="Quantity" id="Quantity" value="<?= $book->getQuantity() ?>"  min="1" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="CategoryID" class="col-3 col-form-label"><strong>Thể loại:
                                        </strong></label>
                                    <div class="col-6">
                                        <select id="CategoryID" class="form-select" name="CategoryID"
                                            aria-label="Default select example" required>
                                            <option value="<?= $book->getCategoryID() ?>"><?= $category->getCategoryNameFromID($book->getCategoryID())  ?></option>
                                            <?php foreach($categories as $category): ?>
                                                
                                                <?php
                                                    
                                                    if($book->getCategoryID() != $category->getCategoryID())
                                                        echo '<option value="'. $category->getCategoryID() . '">' .
                                                            $category->getCategoryName() . '</option>';
                                                    
                                                ?>
                                            

                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="bDescription" class="col-3 col-form-label"><strong>Mô tả:
                                        </strong></label>
                                    <div class="col-6">
                                        <textarea id="bDescription" class="form-control" name="Description" rows="4"
                                            cols="50" placeholder="Nhập mô tả..."  required> <?= $book->getDescription()?> </textarea>
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
                                        <button type="submit" class="btn btn-primary mb-3 w-25"><i class="fa-solid fa-plus"></i> Chỉnh sửa </button>
                                    </div>
                                </div>
                            </form>
                            <div id="bResult"></div>
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