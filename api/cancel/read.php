<?php
    //File to read all the cancel relations

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to the database
    $database = New Database();
    $db = $database->connect();

    // Read all attributes from cancel relation
    $sql = "SELECT * FROM cancel";

    // formatting cancel relation into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Reservation_id' => $row[0],
                'Customer_id' => $row[1],
                'Cancellation_id' => $row[2]
            );

            array_push($usr_arr['data'], $usr_item);
        }
        
        // Output cancel relation in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Cancellations Found'));
    }
?>
