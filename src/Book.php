<?php 
    namespace App;

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
        private $image;

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
                // 'Image' => $this->image sẽ bổ sung sau.
            ] = $row;
            return $this;
        }


        public function getAll() {
            $books = [];
    
            $statement = $this->db->prepare('SELECT * FROM books');
            
            
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
                    // 'Image' => $this->image sẽ bổ sung sau.
                ];

                $books[] = $result;
            }
            return $books;
        }
  
    }

        
?>