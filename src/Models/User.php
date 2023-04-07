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

    public function getUserID(){
        return $this->UserID;
    }

    public function getUsername(){
        return $this->Username;
    }

    public function getEmail(){
        return $this->Email;
    }

    public function getFullname(){
        return $this->Fullname;
    }

    public function getAddress(){
        return $this->Address;
    }

    public function getPhone(){
        return $this->Phone;
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
            $this->fillData($row);
            return $this;
        }
    }

    public function getAll() {
        $users = [];

        $statement = $this->db->prepare('SELECT * FROM users ORDER BY UserID DESC LIMIT 50');
        
        
        $statement->execute();

        while($row = $statement->fetch()) {
            $user = new User('');
            $user->fillData($row);
            $users[] = $user;
        }
        return $users;
    }

    public function changePassword() {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {
            if($this->checkUser($_SESSION['user'], $_POST['oldPassword'])) {
                if($_POST['newPassword']) {
                    $statement = $this->db->prepare("UPDATE users SET Password = :password  WHERE Username = :username");
                    if($statement) {

                        $statement->execute(['password' => $_POST['newPassword'], 'username'=> $_SESSION['user']]);
                        echo "<h6 class='text-success'>Đổi mật khẩu thành công</h6>";
                }
                else {
                    echo "<h6 class='text-danger'>Có lỗi truy xuất/h6>";

                }
                }
            }
            else {
                echo "<h6 class='text-danger'>Sai mật khẩu cũ</h6>";
            }
        }
        else {

            throw new ErrorException("Truy cập không đúng hoặc bạn chưa đăng nhập");

        }
    }


    public function changeInfor() {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {
            // Kiểm tra Email
            if(isset($_POST['Email']) && filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
                // Kiểm tra số điện thoại
                if(isset($_POST['Phone']) && preg_match('/^[0-9]{10}$/', $_POST['Phone'])){


                    $statement = $this->db->prepare("UPDATE users SET Email = :Email, Fullname =:Fullname, Address = :Address, Phone = :Phone  WHERE Username = :username");
                    if($statement) {

                        $statement->execute(['Email' => $_POST['Email'], 'Fullname'=> $_POST['Fullname'],'Address'=> $_POST['Address'], 'Phone'=> $_POST['Phone'], 'username' => $_SESSION['user']]);
                        echo "<h6 class='text-success'>Thay đổi thông tin thành công</h6>";
                    }
                    else {

                        echo "<h6 class='text-danger'>Có lỗi truy vấn xảy ra</h6>";

                    }



                } else {
                    echo "<h6 class='text-danger'>Số điện thoại không hợp lệ</h6>";
                }
             } else {
                echo "<h6 class='text-danger'>Địa chỉ Email không hợp lệ</h6>";
             }

        }
    }



    public function delete($UserID) {
        $statement = $this->db->prepare('DELETE FROM users WHERE UserID = :UserID');

        $statement->execute(['UserID' => $UserID]);

        if($statement) {
            echo "Xóa thành công";
        }
        else {
            echo "Xóa thất bại";
        }
    }



    public function searchUser($Username) {
        $users = [];

        $statement = $this->db->prepare('SELECT * FROM users WHERE Username LIKE :Username');

        $queryUsername = '%' . $Username . '%';
        
        $statement->execute(['Username' => $queryUsername]);
         

        while($row = $statement->fetch()) {
            $result = [
                'UserID' => $row['UserID'], 
                'Username' =>$row['Username'],
                'Email' =>$row['Email'],
                'Fullname'=> $row['Fullname'],
                'Address'=>$row['Address'],
                'Phone'=>$row['Phone'],
            ];
            $users[] = $result;
        }
        return $users;
    }

}



?>