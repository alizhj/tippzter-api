<?php
class Database{
 
    // specify your own database credentials

    private $host;
    private $db_name;
    private $username;
    private $password;

    public $conn;

    function __construct() {
        $this->host = getenv('CLEARDB_DATABASE_HOST');
        $this->db_name = getenv('CLEARDB_DATABASE_NAME');
        $this->username = getenv('CLEARDB_DATABASE_USER');
        $this->password = getenv('CLEARDB_DATABASE_PASSWORD');
    }
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>