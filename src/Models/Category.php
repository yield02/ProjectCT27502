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

        public function getCategoryName(){
            return $this->categoryname;
        }

        public function getImg(){
            return $this->img;
        }

        public function getColor__img(){
            return $this->colorimg;
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
    }
?>