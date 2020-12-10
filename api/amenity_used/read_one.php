<?php
    /*
        Add ?id=1 to get all amenities used by customer 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Read all attributes from amenity_used
    $sql = "SELECT * FROM amenity_used";

    // Get id input from url
    $Customer_id = htmlspecialchars($_GET["id"]);

    // formatting the matching tuples into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[0] == $Customer_id){
                $usr_item = array(
                    'Customer_id' => $row[0],
                    'Number' => $row[1],
                    'Type' => $row[2]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        // Output the resulting json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Amenity Used by this Customer Found'));
    }
?>
