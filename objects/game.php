<?php
class Game{
 
    // database connection and table name
    private $conn;
 
    // object properties
    public $team_home;
    public $team_away;
    public $home_flag;
    public $away_flag;
    public $home_team_number;
    public $away_team_number;
    
    //echo 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
        $query = "SELECT T1.team_name as team_home, T2.team_name as team_away, 
	  				T1.team_flag as home_flag, T2.team_flag as away_flag, 
	  				T1.group_nr as home_team_number, T2.group_nr as away_team_number, 
	  				game_match.*
					FROM game_match, teams T1, teams T2
					WHERE T1.team_id=game_match.home_team_id AND T2.team_id=game_match.away_team_id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}

