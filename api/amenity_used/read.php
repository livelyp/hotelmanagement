<?php
    // File to read all the used amenity relations
    
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Read all attributes from amenity_used in the database
    $sql = "SELECT * FROM amenity_used";

    //formatting the sql into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Customer_id' => $row[0],
                'Number' => $row[1],
                'Type' => $row[2]
            );

            array_push($usr_arr['data'], $usr_item);
        }
        
        //Ouput the resulting json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Amenities Found'));
    }
?>
