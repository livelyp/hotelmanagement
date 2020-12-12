<?php
    /*
        Add ?id=1 to get room type with type id 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes from room type
    $sql = "SELECT * FROM room_type";

    // get type id from url
    $Type_id = htmlspecialchars($_GET["id"]);

    //formatting matching room type into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[0] == $Type_id){
                $usr_item = array(
                    'Type_id' => $row[0],
                    'Room_price' => $row[1],
                    'Total_rooms' => $row[2],
                    'Type' => $row[3]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        // Output matching room type in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Room Types Found'));
    }
?>
