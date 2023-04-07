<?php 

$page = 'editCategory';

include __DIR__.'/../../bootstrap.php';
require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';

use App\Models\Book;
use App\Models\Category;

$category = new Category($PDO);

$categories = $category->getAll();

$category->find($id);



?>

<div id="editCategory">
    <div class="container">
        <div class="accordion-item">
            <h2 class="accordion-header text-center m-4">
                CHỈNH SỬA THỂ LOẠI
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form class="categoryAddForm" id="editCategoryForm">
                        <div class="mb-3 row">
                            <label for="CategoryName" class="col-3 col-form-label"><strong>Tên thể loại:
                                </strong></label>
                            <div class="col-6">
                                <input class="form-control" type="text" name="CategoryName" id="CategoryName" value="<?= $category->getCategoryName() ?>" required>
                                <input class="form-control" type="text" name="CategoryID" id="CategoryID" hidden value="<?= $category->getCategoryID() ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="cDescription" class="col-3 col-form-label">
                                <strong>Mô tả: </strong></label>
                            <div class="col-6">
                                <textarea id="cDescription" class="form-control" name="CategoryDescription" rows="4" cols="50"
                                    placeholder="Nhập mô tả..." required><?= $category->getCategoryDescription() ?></textarea>
                            </div>
                        </div>
                        <div class="my-3 row">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mb-3 w-25"><i class="fa-solid fa-plus"></i>
                                    Chỉnh sửa</button>
                            </div>
                        </div>
                    </form>
                    <div id="cResult"></div>
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