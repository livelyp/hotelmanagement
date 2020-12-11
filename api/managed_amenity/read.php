<?php
    // File to read all managed amenity realtions

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Read all attributes from managed amenity in the database
    $sql = "SELECT * FROM managed_amenity";

    //formatting sql data into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Number' => $row[0],
                'Type' => $row[1],
                'Employee_id' => $row[2]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        // Output all managed amenities as json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Managed Amenities Found'));
    }
?>
