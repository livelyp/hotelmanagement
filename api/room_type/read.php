<?php
    // Read all room types in database

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all atrributes from room type
    $sql = "SELECT * FROM room_type";

    //formatting all room types into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Type_id' => $row[0],
                'Room_price' => $row[1],
                'Total_rooms' => $row[2],
                'Type' => $row[3]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        // Output all room types in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Room Types Found'));
    }
?>
