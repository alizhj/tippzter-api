<?php
class ExtraBet{
 
    // database connection and table name
    private $conn;
 
    // bets table
    public $extra_id;
    public $user_id;
    public $tournament_id;
    public $winning_team;
    public $winning_player;

    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
        
        $userId = isset($_GET['userid']) ? $_GET['userid'] : die();
        $tournamentId = isset($_GET['tournamentid']) ? $_GET['tournamentid'] : die();
        
        $query = "SELECT *
					FROM extra_bets
					WHERE user_id=". $userId ." AND tournament_id=". $tournamentId;
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}

