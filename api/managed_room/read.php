<?php
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    $database = New Database();
    $db = $database->connect();

    //read
    $sql = "SELECT * FROM managed_room";

    //formatting into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Type_id' => $row[0],
                'Room_num' => $row[1],
                'Employee_id' => $row[2]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Managed Rooms Found'));
    }
?>