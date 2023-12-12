<?php
require_once "BaseModel.php";

class Books extends DB{
    public function getAllBooks(){
        $result = $this->conn->prepare("SELECT book_id,title, author, book_description AS description,image, GROUP_CONCAT(category_name) AS categories, user_id FROM (SELECT tbl_books.book_id,title,author,description AS book_description,image,category_id, user_id FROM tbl_books INNER JOIN tbl_books_categories ON tbl_books.book_id = tbl_books_categories.book_id) AS tbl_result INNER JOIN tbl_categories ON tbl_result.category_id = tbl_categories.category_id GROUP BY book_id ORDER BY book_id ASC;");
        $result->execute();
        $result = $result->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getBook($id){
        $result = $this->conn->prepare("SELECT book_id,title, author, book_description AS description,image, GROUP_CONCAT(category_name) AS categories, user_id FROM (SELECT tbl_books.book_id,title,author,description AS book_description,image,category_id, user_id FROM tbl_books INNER JOIN tbl_books_categories ON tbl_books.book_id = tbl_books_categories.book_id) AS tbl_result INNER JOIN tbl_categories ON tbl_result.category_id = tbl_categories.category_id GROUP BY book_id ASC HAVING book_id = ?;");
        $result->bind_param("i",$id);
        $result->execute();
        $result = $result->get_result();
        return $result->fetch_assoc();
    }

    public function addBook($args){
        $result = $this->conn->prepare("INSERT INTO tbl_books (title,author,description,image,user_id) VALUES (?,?,?,?,?)");
        $result->bind_param("ssssi",$args["title"],$args["author"],$args["description"],$args["image"],$args["user_id"]);
        $result->execute();
        $book_id = $result->insert_id;

        foreach ($args["category"] as $category){
            $cat_result = $this->conn->prepare("INSERT INTO tbl_books_categories (book_id,category_id) VALUES (?,?)");
            $cat_result->bind_param("ii",$book_id,$category);
            $sequence_result = $cat_result->execute();
        }

        return $sequence_result;
    }

    public function updateBook($id,$args){
        $result = $this->conn->prepare("UPDATE tbl_books SET title = ?,author = ?,description = ?, image = ? WHERE book_id = ?");
        $result->bind_param("ssssi",$args["title"],$args["author"],$args["description"],$args["image"],$id);
        $result->execute();

        // DROP CATEGORIES
        $drop_result = $this->conn->prepare("DELETE FROM tbl_books_categories WHERE book_id = ?");
        $drop_result->bind_param("i",$id);
        $drop_result->execute();

        foreach ($args["category"] as $category){
            $cat_result = $this->conn->prepare("INSERT INTO tbl_books_categories (book_id,category_id) VALUES (?,?)");
            $cat_result->bind_param("ii",$id,$category);
            $sequence_result = $cat_result->execute();
        }

        return $sequence_result;
    }

    public function deleteBook($id){
        $result = $this->conn->prepare("DELETE FROM tbl_books WHERE book_id = ?");
        $result->bind_param("i",$id);
        return $result->execute();
    }

    public function getBooksByQuery($query){
        $query = "%" . $query . "%";
        $result = $this->conn->prepare("SELECT book_id,title, author, book_description AS description,image, GROUP_CONCAT(category_name) AS categories FROM (SELECT tbl_books.book_id,title,author,description AS book_description,image,category_id FROM tbl_books INNER JOIN tbl_books_categories ON tbl_books.book_id = tbl_books_categories.book_id) AS tbl_result INNER JOIN tbl_categories ON tbl_result.category_id = tbl_categories.category_id GROUP BY title ASC HAVING title LIKE ? OR author LIKE ? or description LIKE ? OR categories LIKE ? ORDER BY book_id;");
        $result->bind_param("ssss",$query,$query,$query,$query);
        $result->execute();
        $result = $result->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}


?>