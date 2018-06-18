<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/extraBet.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$extraBet = new ExtraBet($db);

// query products
$stmt = $extraBet->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
    
    // products array
    $extraBet_arr=array();
    $extraBet_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $extraBet_item=array(
            "id" => $extra_id,
            "userId" => $user_id,
            "tournamentId" => $tournament_id,
            "team" => $winning_team,
            "topScorer" => $winning_player
        );
 
        array_push($extraBet_arr["records"], $extraBet_item);
    }
 
    echo json_encode($extraBet_arr);
}

else{
    echo json_encode(
        array("message" => "No extraBets found.")
    );
}
?>