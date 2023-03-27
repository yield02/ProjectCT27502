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
        private $image;
        private $description;

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

        // public function getImage() {
        //     return $this->image;
        // }

        public function getPublisher() {
            return $this->publisher;
        }
        
        public function getQuantity() {
            return $this->quantity;
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
                // 'image' => $this->image,
                'description'=>$this->description
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
                    'description' => $row['description']
                ];
                $books[] = $result;
            }
            return $books;
        }
  


        public function findBook($BookID) {
            $books = [];

            $statement = $this->db->prepare('SELECT * FROM books WHERE BookID = :BookID');

            $statement->execute(['BookID' => $BookID]);

            $row = $statement->fetch();

            $result = [
                'BookID' => $row['BookID'],
                'Title' => $row['Title'],
                'Author' => $row['Author'],
                'Publisher' => $row['Publisher'],
                'PublishDate' => $row['PublishDate'],
                'ISBN' => $row['ISBN'],
                'Quantity' => $row['Quantity'],
                'CategoryID' =>$row['CategoryID'],
                'image' => $row['image'],
                'description' => $row['description']
            ];
            return $result;
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
        
    }

        
?>