<?php
    // Read all the reserved rooms

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes from reserved rooms
    $sql = "SELECT * FROM reserved_rooms";

    //formatting all reserved rooms into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Reservation_id' => $row[0],
                'Type_id' => $row[1],
                'Room_num' => $row[2]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        // Output the reserved rooms in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Reserved Rooms Found'));
    }
?>
