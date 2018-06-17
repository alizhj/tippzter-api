<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $user_id;
    public $user_name;
    public $user_password;
    public $user_email;
    public $admin;
    
    //echo 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
        
        // select all query
        $query = "SELECT * FROM " . $this->table_name;
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function logIn(){
        $email = isset($_GET['email']) ? $_GET['email'] : die();
        $password = isset($_GET['password']) ? md5($_GET['password']) : die();

        // select all query
        $query = "SELECT * FROM ". $this->table_name ." WHERE user_email = '". $email ."' AND user_password = '". $password ."'";
 
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}

