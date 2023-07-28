<?php

require_once "./classes/Constant.php";

class Account {
    private $cn;
    private $errors = array();

    public function __construct($cn) {
        $this->cn = $cn;
    }

    public function logIn($email, $password) {
        $password = hash("sha512", $password);
        
        $query = $this->cn->prepare("SELECT * FROM users 
            WHERE email=:email AND password=:password");

        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);
        $query->execute();

        if($query->rowCount() === 1) {
            return true;
        } else {
            array_push($this->errors, Constants::$LOGIN_FAIL);
            return false;
        }
    }

    public function register($name, $email, $mobile, $role, $designation, $password, $confirmPassword, $city, $pincode, $address) {
        $this->validateName($name);
        
        $this->validateEmail($email);
        $this->validatePassword($password);
        $this->commparePassword($password, $confirmPassword);

        // echo $role;
        // die($designation);

        if(empty($this->errors)) {
            return $this->insertUserData($name, $email, $mobile, $role, $designation, $password, $city, $pincode, $address); // return bool
        } else {
            return false;
        }
    }

    public function updateDetails($name, $mobile, $email, $city, $pincode, $address) {
        $this->validateName($name);

        if(empty($this->errors)) {
            return $this->updateUserData($name, $mobile, $email, $city, $pincode, $address);
        } else {
            return false;
        }
    }

    public function updatePassword($oldpassword, $newpassword, $confirmNewPassword, $email) {
        $newOldPassword = hash("sha512", $oldpassword);
        $query = $this->cn->prepare("SELECT * FROM users WHERE password=:password AND email=:email");
        $query->bindParam(":password", $newOldPassword);
        $query->bindParam(":email", $email);
        $query->execute();

        if(! $query->rowCount() > 0) {
            echo "<script>alert('Old Password does not match');</script>";
            // header("Location:profile.php");
            return false;
        }
        
        $this->validatePassword($oldpassword);
        $this->validatePassword($newpassword);
        $this->validatePassword($confirmNewPassword);
        $this->commparePassword($newpassword, $confirmNewPassword);

        if(empty($this->errors)) {
            $newPassword = hash("sha512", $newpassword);
            return $this->updatePasswordData($newOldPassword, $newPassword, $email);
        }
    }

    public function updateAvatar($url, $email) {
        $query = $this->cn->prepare("UPDATE users SET profile=:profile WHERE email=:email");
        $query->bindParam(":profile", $url);
        $query->bindParam(":email", $email);
        $query->execute();
        return true;
    }

    public static function changePasswordById($newpassword, $id) {
        global $cn;
        $newPassword = hash("sha512", $newpassword);
        $query = $cn->prepare("UPDATE users SET password=:newpassword WHERE id=:id");
        $query->bindParam(":newpassword", $newPassword);
        $query->bindParam(":id", $id);
        return $query->execute();
    }

    private function updatePasswordData($oldpassword, $newPassword, $email) {
        $query = $this->cn->prepare("UPDATE users SET password=:newpassword WHERE password=:oldpassword AND email=:email");
        $query->bindParam(":newpassword", $newPassword);
        $query->bindParam(":oldpassword", $oldpassword);
        $query->bindParam(":email", $email);
        return $query->execute();
    }

    private function updateUserData($name, $mobile, $email, $city, $pincode, $address) {
        $query = $this->cn->prepare("UPDATE users 
            SET 
            name=:name, 
            mobile=:mobile, 
            city=:city, 
            pincode=:pincode, 
            address=:address
            WHERE 
            email=:email");
        $query->bindParam(":name", $name);
        $query->bindParam(":mobile", $mobile);
        $query->bindParam(":email", $email);
        $query->bindParam(":city", $city);
        $query->bindParam(":pincode", $pincode);
        $query->bindParam(":address", $address);
        $query->execute();
        return true;
    }
    
    private function insertUserData($name, $email, $mobile, $role, $designation, $password, $city, $pincode, $address) {
        $newPassword = hash("sha512", $password);
        $profile = "storage/image/profile.jpg";
        // die($address);

        $query = $this->cn->prepare("INSERT INTO users (name, email, mobile, role_name, designation, password, profile, city, pincode, address) 
            VALUES (:name, :email, :mobile, :role_name, :designation, :password, :profile, :city, :pincode, :address)");
        $query->bindParam(":name", $name);
        $query->bindParam(":email", $email);
        $query->bindParam(":mobile", $mobile);
        $query->bindParam(":role_name", $role);
        $query->bindParam(":designation", $designation);
        $query->bindParam(":password", $newPassword);
        $query->bindParam(":profile", $profile);
        $query->bindParam(":city", $city);
        $query->bindParam(":pincode", $pincode);
        $query->bindParam(":address", $address);
        $query->execute(); 
        return true;        
    }

    private function validateName($name) {
        if(strlen($name) > 25 || strlen($name) < 2) {
            array_push($this->errors, Constants::$FIRST_NAME_CHARACHER);
            return;
        }
        if(preg_match("/[^a-zA-Z]/", $name)) {
            array_push($this->errors, Constants::$FIRST_NAME_ONLY_CHARACHER);
        }

    }

    private function validateEmail($email) {
        if(! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errors, Constants::$EMAIL_INVALID);
            return;
        }

        $query = $this->cn->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam(":email", $email);
        $query->execute();

        if($query->rowCount() != 0) {
            array_push($this->errors, Constants::$EMAIL_TAKEN);
            return;
        }
    }

    private function validatePassword($password) {
        if(strlen($password) > 25 || strlen($password) <= 7) {
            array_push($this->errors, Constants::$PASSWORD_CHARACHER);
            return;
        }
    }

    private function commparePassword($p1, $p2) {
        if($p1 != $p2) {
            array_push($this->errors, Constants::$PASSWORD_NOT_MATCH);
            return;
        }
    }

    public function getError($error) {
        if(in_array($error, $this->errors)) {
            return "<span class='invalid-feedback' style='display: block; text-align: center'>$error</span>";
        }
    }

}
?>