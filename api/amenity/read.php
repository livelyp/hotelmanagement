<?php
    //File to read all amenity tuples
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes from amenity
    $sql = "SELECT * FROM amenity";

    //formatting the sql into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Number' => $row[0],
                'Type' => $row[1]
            );

            array_push($usr_arr['data'], $usr_item);
        }
        
        // Output all the amenities found as json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Amenities Found'));
    }
?>
