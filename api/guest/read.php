<?php
    // File to read all the guests in the database

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Read all guests from database
    $sql = "SELECT * FROM guest";

    //formatting guest data into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Customer_id' => $row[0]
            );

            array_push($usr_arr['data'], $usr_item);
        }
        
        // Output the guests in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Guests Found'));
    }
?>
