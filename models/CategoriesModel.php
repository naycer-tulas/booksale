<?php
require_once "BaseModel.php";

class Categories extends DB{
    public function addCategory($args){
        $result = $this->conn->prepare("INSERT INTO tbl_categories(category_name,description) VALUES (?,?)");
        $result->bind_param("ss",$args["category_name"],$args["description"]);
        return $result->execute();
    }

    public function getAllCategories(){
        $result = $this->conn->prepare("SELECT * FROM tbl_categories");
        $result->execute();
        $result = $result->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategory($id){
        $result = $this->conn->prepare("SELECT * FROM tbl_categories WHERE category_id = ?");
        $result->bind_param("i",$id);
        $result->execute();
        $result = $result->get_result();
        return $result->fetch_assoc();
    }

    public function updateCategory($args){
        $result = $this->conn->prepare("UPDATE tbl_categories SET category_name = ?,description = ? WHERE category_id = ?");
        $result->bind_param("ssi",$args["category_name"],$args["description"],$args["id"]);
        return $result->execute();
    }

    public function deleteCategory($id){
        $result = $this->conn->prepare("DELETE FROM tbl_categories WHERE category_id = ?");
        $result->bind_param("i",$id);
        return $result->execute();
    }
} 