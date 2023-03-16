<?php

namespace App;

class User {
    private $db; 

    private $UserID;
    private $Username;
    private $Password;
    private $Email;
    private $FullName;
    private $Address;
    private $Phone;

    
    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function checkUser($username, $pass) {
        
        $statement = $this->db->prepare("SELECT * FROM users WHERE Username = :username and Password = :pass");
        $statement->execute(['username' => $username, 'pass' => $pass]);

        if($statement->rowCount() == 0) {
            return 0;
        }
        return 1;
    }

}



?>