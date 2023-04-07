<?php 
    namespace App\Models;
    

    class Book {
        private $db;

        private $bookid;
        private $title;
        private $author;
        private $publisher;
        private $publishDate;
        private $ISBN;
        private $quantity;
        private $categoryID;
        private $Description;

        public function __construct($pdo) {
            $this->db= $pdo;
        }

        public function getID() {
            return $this->bookid;
        }

        public function getTitle(){
            return $this->title;
        }

        public function getAuthor() {
            return $this->author;
        }

        public function getPublisher() {
            return $this->publisher;
        }

        public function getPublishDate() {
            return $this->publishDate;
        }

        public function getISBN() {
            return $this->ISBN;
        }
        
        public function getQuantity() {
            return $this->quantity;
        }

        public function getCategoryID() {
            return $this->categoryID;
        }



            
        

        public function getDescription() {
            return $this->Description;
        }

        protected function fillData(array $row) {
            [
                'BookID' => $this->bookid,
                'Title' => $this->title,
                'Author' => $this->author,
                'Publisher' => $this->publisher,
                'PublishDate' => $this->publishDate,
                'ISBN' => $this->ISBN,
                'Quantity' => $this->quantity,
                'CategoryID' =>$this->categoryID,
                'Description'=>$this->Description
            ] = $row;
            return $this;
        }


        public function getAll() {
            $books = [];

            $statement = $this->db->prepare('SELECT * FROM books ORDER BY PublishDate DESC LIMIT 100');
            
            
            $statement->execute();

            while($row = $statement->fetch()) {
                $book = new Book('');
                $book->fillData($row);
                $books[] = $book;
            }
            return $books;
        }

        public function searchTitle($title) {
            $books = [];

            $statement = $this->db->prepare('SELECT * FROM books WHERE Title LIKE :Title');

            $queryTitle = '%' . $title . '%';
            
            $statement->execute(['Title' => $queryTitle]);
             
            $category = new Category($this->db);

            while($row = $statement->fetch()) {
                $result = [
                    'BookID' => $row['BookID'],
                    'Title' => $row['Title'],
                    'Author' => $row['Author'],
                    'Publisher' => $row['Publisher'],
                    'PublishDate' => $row['PublishDate'],
                    'ISBN' => $row['ISBN'],
                    'Quantity' => $row['Quantity'],
                    'CategoryID' =>$row['CategoryID'],
                    'CategoryName' => $category->getCategoryNameFromID($row['CategoryID']),
                    'Description' => $row['Description']
                ];
                $books[] = $result;
            }
            return $books;
        }


            

        public function searchBookFromCategoriesID($categoriesID) {
            $books = [];

            $statement = $this->db->prepare('SELECT * FROM books WHERE CategoryID = :categoryID');
        
            $statement->execute(['categoryID' => $categoriesID]);


            while($row = $statement->fetch()) {
                $result = [
                    'BookID' => $row['BookID'],
                    'Title' => $row['Title'],
                    'Author' => $row['Author'],
                    'Publisher' => $row['Publisher'],
                    'PublishDate' => $row['PublishDate'],
                    'ISBN' => $row['ISBN'],
                    'Quantity' => $row['Quantity'],
                    'CategoryID' =>$row['CategoryID'],
                    'Description' => $row['Description']
                ];
                $books[] = $result;
            }
            return $books;
        }
  

        public function delete($BookID) {
            $statement = $this->db->prepare('DELETE FROM books WHERE BookID = :BookID');

            $statement->execute(['BookID' => $BookID]);

            if($statement) {
                echo "Xóa thành công";
            }
            else {
                echo "Xóa thất bại";
            }
        }


        public function findBook($BookID) {
            $books = [];

            $statement = $this->db->prepare('SELECT * FROM books WHERE BookID = :BookID');

            $statement->execute(['BookID' => $BookID]);

            $row = $statement->fetch();

            $this->fillData($row);
            return $this;
        }


        public function getNewestBooks() {
            $books = [];
        
            $statement = $this->db->prepare('SELECT * FROM books ORDER BY PublishDate DESC LIMIT 6;');
        
            $statement->execute();
            while ($row = $statement->fetch()) {
                $book = new Book('');
                $book->fillData($row);
                $books[] = $book;
            }
            return $books;
        }

        public function getNewestBook() {
            $books = [];
        
            $statement = $this->db->prepare('SELECT * FROM books ORDER BY PublishDate DESC LIMIT 1;');
        
            $statement->execute();
            while ($row = $statement->fetch()) {
                $book = new Book('');
                $book->fillData($row);
                $books[] = $book;
            }
            return $books;
        }

        public function getRandomBooks() {
            $books = [];
            
            $statement = $this->db->prepare('SELECT * FROM books ORDER BY RAND() LIMIT 5;');
            
            $statement->execute();
            while ($row = $statement->fetch()) {
                $book = new Book('');
                $book->fillData($row);
                $books[] = $book;
            }
            return $books;
        }

        public function add($Title, $Author, $Publisher, $PublishDate, $ISBN, $Quantity, $CategoryID, $Description) {
            $statement = $this->db->prepare("INSERT INTO books (Title, Author, Publisher, PublishDate, ISBN, Quantity, CategoryID, Description) VALUES (:Title, :Author, :Publisher, :PublishDate, :ISBN, :Quantity, :CategoryID, :Description);");
            $result = $statement->execute(["Title"=> $Title, "Author"=> $Author, "Publisher"=> $Publisher, "PublishDate"=> $PublishDate, "ISBN"=> $ISBN, "Quantity"=> $Quantity, "CategoryID"=> $CategoryID, "Description" => $Description]);
        
            if ($result) {
                return $this->db->lastInsertId();
            } else {
                return 0;
            }
        }

        public function edit($Title, $Author, $Publisher, $PublishDate, $ISBN, $Quantity, $CategoryID, $Description, $BookID) {
            $statement = $this->db->prepare("UPDATE books SET Title=:Title, Author=:Author, Publisher=:Publisher, PublishDate=:PublishDate, ISBN=:ISBN, Quantity=:Quantity, CategoryID=:CategoryID, Description=:Description WHERE BookID=:id");
            $result = $statement->execute(["Title"=> $Title, "Author"=> $Author, "Publisher"=> $Publisher, "PublishDate"=> $PublishDate, "ISBN"=> $ISBN, "Quantity"=> $Quantity, "CategoryID"=> $CategoryID, "Description" => $Description, 'id' => $BookID]);
        
            if ($result) {
                return $this->db->lastInsertId();
            } else {
                return 0;
            }
        }








    }


        

        
?>