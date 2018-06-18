<?php
class Scoreboard{
 
    // database connection and table name
    private $conn;
 
    // bets table
    public $user_tournament_id;
    public $user_id;
    public $user_name;
    public $tournament_id;
    public $user_points;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){

        $tournamentId = isset($_GET['tournamentid']) ? $_GET['tournamentid'] : die();
        
        $query = "SELECT *
					FROM user_tournaments
                    WHERE tournament_id=". $tournamentId ." 
                    ORDER BY user_points DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}

