<?php
class DB {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "db_booksale";
    public $conn;

    function __construct(){
        $this->conn = new mysqli($this->host,$this->username,$this->password,$this->dbName);
    }
}