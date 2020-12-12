<?php
    /*
        Add ?id=1 to get reservation information from the id 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes from reservation
    $sql = "SELECT * FROM reservation";

    // Get reservation id from url
    $Reservation_id = htmlspecialchars($_GET["id"]);

    //formatting matching reservation into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[0] == $Reservation_id){
                $usr_item = array(
                    'Reservation_id' => $row[0],
                    'Arrival_date' => $row[1],
                    'Checkout_date' => $row[2]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        // Output the matching reservation information in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Such Reservation Found'));
    }
?>
