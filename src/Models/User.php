<?php

namespace App\Models;

class User {
    private $db; 

    private $UserID;
    private $Username;
    private $Password;
    private $Email;
    private $FullName;
    private $Address;
    private $Phone;
    private $isAdmin;

    
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

    public function checkUserName($username) {
        
        $statement = $this->db->prepare("SELECT * FROM users WHERE Username = :username");
        $statement->execute(['username' => $username]);

        if($statement->rowCount() == 0) {
            return 0;
        }
        return 1;
    }

    public function fillData(array $row) {
            [
                'UserID' => $this->UserID, 
                'Username' =>$this->Username,
                'Email' =>$this->Email,
                'Fullname'=> $this->Fullname,
                'Address'=>$this->Address,
                'Phone'=>$this->Phone,
                'isAdmin'=>$this->isAdmin,
            ] = $row;
        return $this;
    }

    public function checkAdmin($username, $pass) {
        $statement = $this->db->prepare("SELECT isAdmin FROM users WHERE Username = :username AND Password = :password");

        $statement->execute(['username' => $username, 'password' => $pass]);

        if($statement->rowCount() == 0) {
            return $error = "Không có người dùng này";
        }
        else {
            $row = $statement->fetch();
            return $row['isAdmin'];
        }
    }

    public function register($username, $password, $email, $phone) {
        $statement = $this->db->prepare("INSERT INTO users (Username, Password, Email, Phone) VALUES (:username, :password, :email, :phone)");

        $result = $statement->execute(['username' => $username, 'password' => $password, 'email' => $email, 'phone' => $phone]);

        return $result;
    }


    public function getUser($username) {
        $statement = $this->db->prepare("SELECT * FROM users WHERE Username = :username");

        $statement->execute(['username' => $username]);

        if($statement->rowCount() == 0) {
            return $error = "Không có người dùng này";
        }
        else {
            $row = $statement->fetch();
            $user = new User('');
            $user->fillData($row);
            return $user;
        }
    }

}



?>