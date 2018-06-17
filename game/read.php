<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/game.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$game = new Game($db);

// query products
$stmt = $game->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found

if($num>0){
    
    // products array
    $game_arr=array();
    $game_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $game_item=array(
            "team_home" => $team_home,
            "team_away" => $team_away,
            "home_flag" => $home_flag,
            "away_flag" => $away_flag,
            "home_team_number" => $home_team_number,
            "away_team_number" => $away_team_number
        );
 
        array_push($game_arr["records"], $game_item);
    }
 
    echo json_encode($game_arr);
}

else{
    echo json_encode(
        array("message" => "No games found.")
    );
}
?>