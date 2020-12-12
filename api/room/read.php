<?php
    // Read all room information

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes for room
    $sql = "SELECT * FROM room";

    //formatting all rooms into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Type_id' => $row[0],
                'Room_num' => $row[1]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        // Output all rooms as json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Rooms Found'));
    }
?>
