<?php
require_once "BaseModel.php";

class Users extends DB{
    public function addUser($args){
        $result = $this->conn->prepare("INSERT INTO tbl_users(first_name,last_name,email,password,type) VALUES (?,?,?,?, 'regular')");
        $result->bind_param("ssss",$args["first-name"],$args["last-name"],$args["user-email"],$args["user-password"]);
        return $result->execute();
    }

    public function loginUser($args){
        $result = $this->conn->prepare("SELECT user_id,CONCAT(first_name,' ',last_name) as name,type FROM tbl_users WHERE email = ? AND password = ?");
        $result->bind_param("ss",$args["login-user-email"],$args["login-user-password"]);
        $result->execute();
        $result = $result->get_result();
        return $result->fetch_assoc();
    }

    public function getAllUsers(){
        $result = $this->conn->prepare("SELECT user_id,first_name,last_name,email,type FROM tbl_users");
        $result->execute();
        $result = $result->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
} 