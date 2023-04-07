<?php 
    namespace App\Models;

    class BorrowTicket {
        
        private $db;

        private $BorrowID;

        private $UserID;

        private $BorrowDate;

        private $DueDate;

        private $ReturnDate;

        private $Status;

        private $LateFee;

        public function __construct($pdo) {
            $this->db= $pdo;
            
        }
        
        public function getUserID() {
            return $this->UserID;
        } 

        public function getBorrowID() {
            return $this->BorrowID;
        }

        public function getBorrowDate() {
            return $this->BorrowDate;
        }

        public function getDueDate() {
            return $this->DueDate;
        }

        public function getReturnDate() {
            return $this->ReturnDate;
        }

        public function getStatus() {
            return $this->Status;
        }

        public function getLateFee() {
            return $this->LateFee;
        }

        
        protected function fillData(array $row) {
            [
                'BorrowID' => $this->BorrowID,
                'UserID' => $this->UserID,
                'BorrowDate' => $this->BorrowDate,
                'DueDate' => $this->DueDate,
                'ReturnDate' => $this->ReturnDate,
                'Status' => $this->Status,
                'LateFee' => $this->LateFee,
            ] = $row;
            return $this;
        }

        public function getAll() {

            $statement = $this->db->prepare('SELECT * FROM borrowings where Status = :status');

            $statement->execute(['status' => 'waiting']);

            while($row = $statement->fetch()) {
                $BorrowTicket = new BorrowTicket('');
                $BorrowTicket->fillData($row);
                $BorrowTickets[] = $BorrowTicket;
            }
            return $BorrowTickets;
        }

        public function getCart($username) {

            $user = new User($this->db);

            $user->getUser($username);

            $statement = $this->db->prepare('SELECT * FROM borrowings where Status = :status and UserID = :userID');

            $statement->execute(['status' => 'cart', "userID" => $user->getUserID()]);

            if($statement->rowCount() == 1) {

                $row = $statement->fetch();
                $this->fillData($row);
                return $this;
                
            }
            return false;
        }

        public function addCart($username) {
            
            $user = new User($this->db);

            $user->getUser($username);

            $statement = $this->db->prepare('INSERT INTO borrowings (UserID, Status) VALUES(:UserID, :Status)');

            $statement->execute(['UserID' => $user->getUserID(), "Status" => "Cart"]);

            if($statement) {
                return $this->db->lastInsertId();
            }
            return false;
        }

    }
?>