<?php
    // File to read all pay relations in database

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes from pays
    $sql = "SELECT * FROM pays";

    //formatting pays relations into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Mgr_id' => $row[0],
                'Employee_id' => $row[1]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        // Output all pays realtions in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No pays relations found'));
    }
?>
