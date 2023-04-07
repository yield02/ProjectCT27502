<?php 
    namespace App\Models;

    class BorrowDetail {
        
        private $db;

        private $BorrowDetailID;

        private $BorrowID;

        private $BookID;

        private $quantity;

        public function __construct($pdo) {
            $this->db= $pdo;
            
        }
        
        public function getBookID() { 
            return $this->BookID;
        }

        public function BorrowDetailID() {
            return $this->BorrowDetailID;
        }

        public function getBorrowID() {
            return $this->BorrowID;
        }
        
        protected function fillData(array $row) {
            [
                'BorrowDetailID' => $this->BorrowDetailID,
                'BorrowID' => $this->BorrowID,
                'BookID' => $this->BookID,
            ] = $row;
            return $this;
        }


        public function getBorrowDetailFromBorrowID($BorrowTicketID) {

            $statement = $this->db->prepare('SELECT * FROM borrowingdetails where BorrowID = :BorrowID');

            $statement->execute(['BorrowID' => $BorrowTicketID]);

            while($row = $statement->fetch()) {
                $BorrowDetail = new BorrowDetail('');
                $BorrowDetail->fillData($row);
                $BorrowDetails[] = $BorrowDetail;
            }
            return $BorrowDetails;
        }

        public function addDetailCart($BorrowID, $BookID) {


            $statmentCheck = $this->db->prepare('SELECT * FROM borrowingdetails where BorrowID = :BorrowID AND BookID = :BookID');
            $statmentCheck->execute(['BorrowID' => $BorrowID, 'BookID' => $BookID]);
            
            if($statmentCheck->rowCount() > 0) {
                return 0;
            }

            $statement = $this->db->prepare('INSERT INTO borrowingdetails (BorrowID, BookID) VALUES (:BorrowID, :BookID)');

            $statement->execute(['BorrowID' => $BorrowID, 'BookID' => $BookID]);

            if($statement) {
                return TRUE;
            }
            return FALSE;
        }

        public function deleteDetailCart($BorrowDetailID) {
            
            $statement = $this->db->prepare('DELETE FROM borrowingdetails WHERE BorrowDetailID = :BorrowDetailID');

            $statement->execute(['BorrowDetailID' => $BorrowDetailID]);

            if($statement) {
                echo "Xóa thành công";
            }
            else {
                echo "Xóa thất bại";
            }
        }

    }
?>