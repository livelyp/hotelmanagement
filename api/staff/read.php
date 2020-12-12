<?php
    // Read  all staff members in database

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes from staff
    $sql = "SELECT * FROM staff";

    //formatting all staff into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Employee_id' => $row[0],
                'Mgr_id' => $row[1]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        // Output all staff in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Staff Found'));
    }
?>
