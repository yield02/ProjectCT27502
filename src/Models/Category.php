<?php 
    namespace App\Models;

    class Category {
        private $db;

        private $categoryid;
        private $categoryname;
        private $description;
        private $img;
        private $colorimg;

        public function __construct($pdo) {
            $this->db= $pdo;
        }

        public function getCategoryID(){
            return $this->categoryid;
        }

        public function getCategoryName(){
            return $this->categoryname;
        }

        public function getCategoryDescription(){
            return $this->description;
        }

        public function getColor__img(){
            return $this->colorimg;
        }

        public function getCategoryImg(){
            return $this->img;
        }

        protected function fillData(array $row) {
            [
                'CategoryID' => $this->categoryid,
                'CategoryName' => $this->categoryname,
                'Description' => $this->description,
                'Img' => $this->img,
                'Color__img' => $this->colorimg,
            ] = $row;
            return $this;
        }

        public function getAll() {
            $categories = [];

            $statement = $this->db->prepare('SELECT * FROM categories');
            
            
            $statement->execute();

            while($row = $statement->fetch()) {
                $category = new Category('');
                $category->fillData($row);
                $categories[] = $category;
            }
            return $categories;
        }

        public function find($CategoryID) {
            $books = [];

            $statement = $this->db->prepare('SELECT * FROM categories WHERE CategoryID = :CategoryID');

            $statement->execute(['CategoryID' => $CategoryID]);

            $row = $statement->fetch();

            $this->fillData($row);
            return $this;
        }

        public function getCategoryNameFromID($id) {

            $statement = $this->db->prepare('SELECT CategoryName FROM categories WHERE CategoryID = :categoryID');
        
            $statement->execute(['categoryID' => $id]);

            $row = $statement->fetch();

            return $row['CategoryName'];
        }

        public function add($CategoryName, $Description) {
            $statement = $this->db->prepare('INSERT INTO categories (CategoryName, Description) VALUES (:CategoryName, :Description)');

            $statement->execute(['CategoryName' => $CategoryName, 'Description' => $Description]);

            if($statement) {
                echo "<h6 class='text-success'>Thêm thành công</h6>";
            }
            else {
                echo "<h6 class='text-danger'>Có lỗi xảy ra</h6>";

            }
        }

        public function delete($CategoryID) {
            $statement = $this->db->prepare('DELETE FROM categories WHERE CategoryID = :CategoryID');

            $statement->execute(['CategoryID' => $CategoryID]);

            if($statement) {
                echo "Xóa thành công";
            }
            else {
                echo "Xóa thất bại";
            }
        }

        public function edit($CategoryID, $CategoryName, $Description) {

            $statement = $this->db->prepare('UPDATE categories SET CategoryName = :CategoryName, Description = :Description WHERE CategoryID = :CategoryID');

            $statement->execute(['CategoryName' => $CategoryName, 'Description' => $Description, 'CategoryID' => $CategoryID]);

            if($statement) {
                return TRUE;
            }
            else {
                return FALSE;

            }

        }

    }
?>