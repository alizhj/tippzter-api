<?php
class Bet{
 
    // database connection and table name
    private $conn;
 
    // bets table
    public $bet_id;
    public $game_id;
    public $user_id;
    public $tournament_id;
    public $goal_home;
    public $goal_away;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
        
        $userId = isset($_GET['userid']) ? $_GET['userid'] : die();
        $tournamentId = isset($_GET['tournamentid']) ? $_GET['tournamentid'] : die();
        
        $query = "SELECT *
					FROM bets
					WHERE user_id=". $userId ." AND ". $tournamentId;
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}

