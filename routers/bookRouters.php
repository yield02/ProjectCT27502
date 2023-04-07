<?php 
   
    
$router->get('book/searchTitle/{title}', function($title) {
    global $PDO;
    $book = new App\Models\Book($PDO);
    $books = array();
    $books = $book->searchTitle($title);
    echo json_encode($books, JSON_UNESCAPED_UNICODE);
});

$router->get('book/categories/{categoriesID}', function($categoriesID) {
    global $PDO;
    $book = new App\Models\Book($PDO);
    $books = array();
    $books = $book->searchBookFromCategoriesID($categoriesID);
    echo json_encode($books, JSON_UNESCAPED_UNICODE);
});

$router->get('book/search/{id}', 'App\PageController@book');

// $router->get('book/search/{id}', function($id) {
//     global $PDO;
//     $book = new App\Models\Book($PDO);
//     echo json_encode($book->findBook($id), JSON_UNESCAPED_UNICODE);
// });


$router->post('add/book', function() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user']) && $_SESSION['admin'] == 1) {

        global $PDO;
        $book = new App\Models\Book($PDO);

        if(isset($_POST['Title']) && isset($_POST['Author']) && isset($_POST['Publisher']) && isset($_POST['PublishDate']) && isset($_POST['ISBN']) && isset($_POST['Quantity']) && isset($_POST['CategoryID']) && isset($_POST['Description']) && $_FILES['Img']['tmp_name']) {

            $id = $book->add($_POST['Title'], $_POST['Author'], $_POST['Publisher'], $_POST['PublishDate'], $_POST['ISBN'], $_POST['Quantity'], $_POST['CategoryID'], $_POST['Description']);
        
            if(isset($_FILES['Img'])) {
                $errors = array();
                $file_name = $_FILES['Img']['name'];
                $file_size = $_FILES['Img']['size'];
                $file_tmp = $_FILES['Img']['tmp_name'];
                $file_type = $_FILES['Img']['type'];
        
                $file_ext_arr = explode('.', $_FILES['Img']['name']);
                $file_ext = strtolower(end($file_ext_arr));
            
                $extensions = array("jpeg", "jpg", "png");
            
                if(in_array($file_ext, $extensions) === false){
                $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
                }
            
                if($file_size > 2097152) {
                $errors[] = 'Kích thước file không được vượt quá 2MB';
                }
            
                if(empty($errors)==true) {
                    $target_dir = __DIR__ . '/../src/assets/img/';
                    $target_file = $target_dir . $id .".png";
                    move_uploaded_file($file_tmp, $target_file);
                    echo "<h6 class='text-info'>Thêm Thành Công</h6>";

                }else{
                print_r($errors);
                }
            }    
        

            else {
                echo "<h6 class='text-danger'>Vui lòng kiểm tra lại thông tin</h6>";

            }

        }
    }

    
});

$router->delete('book/delete/{id}', function($id) {

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_SESSION['user']) && $_SESSION['admin'] == 1) {
        $target_dir = __DIR__ . '/../src/assets/img/';
        $target_file = $target_dir . $id .".png";
        unlink($target_file);
        global $PDO;
        $book = new App\Models\Book($PDO);  
        $book->delete($id);

    }

});


$router->delete('delete/category/{id}', function($id) {



    if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_SESSION['user']) && $_SESSION['admin'] == 1) {
        $target_dir = __DIR__ . '/../src/assets/img/';
        $target_file = $target_dir . $id .".png";
        unlink($target_file);
        global $PDO;
        $book = new App\Models\Book($PDO);  
        $book->delete($id);

    }

});




$router->post('add/category', function() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user']) && $_SESSION['admin'] == 1) {
        if(isset($_POST['CategoryName']) && isset($_POST['cDescription']) && $_POST['CategoryName'] !== '' && $_POST['cDescription'] !== '') {
            global $PDO;
            $category = new App\Models\Category($PDO);
            $category->add($_POST['CategoryName'], $_POST['cDescription']);
        }

        else {
            echo "<h6 class='text-danger'>Vui lòng nhập đầy đủ thông tin</h6>";
        }
        
    }
    
});


$router->post('edit/book', function() {

    

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user']) && $_SESSION['admin'] == 1) {

        if(isset($_POST['Title']) && isset($_POST['Author']) && isset($_POST['Publisher']) && isset($_POST['PublishDate']) && isset($_POST['ISBN']) && isset($_POST['Quantity']) && isset($_POST['CategoryID']) && isset($_POST['Description']) && $_FILES['Img']['tmp_name']) {
            
            // Xóa file

            $target_dir = __DIR__ . '/../src/assets/img/';
            $target_file = $target_dir .   $_POST['bookID']  .".png";
            unlink($target_file);

            // Thêm file
            $errors = array();
            $file_name = $_FILES['Img']['name'];
            $file_size = $_FILES['Img']['size'];
            $file_tmp = $_FILES['Img']['tmp_name'];
            $file_type = $_FILES['Img']['type'];
    
            $file_ext_arr = explode('.', $_FILES['Img']['name']);
            $file_ext = strtolower(end($file_ext_arr));
        
            $extensions = array("jpeg", "jpg", "png");
        
            if(in_array($file_ext, $extensions) === false){
            $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
            }
            
            if($file_size > 2097152) {
            $errors[] = 'Kích thước file không được vượt quá 2MB';
            }
        
            if(empty($errors)==true) {
                $target_dir = __DIR__ . '/../src/assets/img/';
                $target_file = $target_dir . $_POST['bookID'] .".png";
                move_uploaded_file($file_tmp, $target_file);

                // Đổi thông tin
                global $PDO;
                $book = new App\Models\Book($PDO);
                
                if($book->edit($_POST['Title'], $_POST['Author'], $_POST['Publisher'], $_POST['PublishDate'], $_POST['ISBN'], $_POST['Quantity'], $_POST['CategoryID'], $_POST['Description'], $_POST['bookID'])) {
                    echo "Cập nhật thành công";
                }

                else {
                    echo "Có lỗi cập nhật dữ liệu";
                }


            
            }else{
                echo "Cập nhật hình ảnh Thất bại";
            }
        }
        else if(isset($_POST['Title']) && isset($_POST['Author']) && isset($_POST['Publisher']) && isset($_POST['PublishDate']) && isset($_POST['ISBN']) && isset($_POST['Quantity']) && isset($_POST['CategoryID']) && isset($_POST['Description'])) {
            
            echo "DK2";

        }
        else {
            echo "DK3";
        }
        

    }

});



$router->post('edit/category', function() {

    

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user']) && $_SESSION['admin'] == 1) {
        if(isset($_POST['CategoryID']) && $_POST['CategoryID'] != '' && isset($_POST['CategoryName']) && $_POST['CategoryName'] != '' && isset($_POST['CategoryDescription']) && $_POST['CategoryDescription'] != '') {
            global $PDO;
            $category = new App\Models\Category($PDO);
            if($category->edit($_POST['CategoryID'], $_POST['CategoryName'], $_POST['CategoryDescription'])) {
                echo "Cập nhật thành công";
            }
            else {
                echo "Cập nhật thất bại [Kiểm tra lại database]";
            }
        }
        else {
            echo "Cập nhật thất bại [Kiểm tra lại dữ liệu]";
        }
        

    }

});

$router->post('add/cart', 'App\PageController@BorrowAddCart');

$router->post('delete/cart/book', 'App\PageController@deleteBookCart');

$router->get('cart/{username}', 'App\PageController@cart');


?>