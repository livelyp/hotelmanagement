<?php
    // Read  all reservation from database
    
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes from reservation
    $sql = "SELECT * FROM reservation";

    //formatting reservations into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Reservation_id' => $row[0],
                'Arrival_date' => $row[1],
                'Checkout_date' => $row[2]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        // output all reservation in the database as json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Reservation Found'));
    }
?>
