<?php
    /*
        Add ?id=1 to get all payment types  for customer 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    $database = New Database();
    $db = $database->connect();

    //read
    $sql = "SELECT * FROM managed_room";

    $Employee_id = htmlspecialchars($_GET["id"]);

    //formatting into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[2] == $Employee_id){
                $usr_item = array(
                    'Type_id' => $row[0],
                    'Room_num' => $row[1],
                    'Employee_id' => $row[2]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No rooms managed by this employee Found'));
    }
?>