<?php
    /*
        Add ?id=1 to get all rooms managaed by employee 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Read all attributes from manager room
    $sql = "SELECT * FROM managed_room";

    // Get desired employee id from url
    $Employee_id = htmlspecialchars($_GET["id"]);

    //formatting matching room into json
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

        // Output all rooms managed by the employee in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No rooms managed by this employee found'));
    }
?>
