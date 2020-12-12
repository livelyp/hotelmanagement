<?php
    // File to read all payment amounts

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Read all atrributes from payment amount
    $sql = "SELECT * FROM payment_amount";

    //formatting payment amounts into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Reservation_id' => $row[0],
                'Customer_id' => $row[1],
                'Amount' => $row[2]
            );

            array_push($usr_arr['data'], $usr_item);
        }
        
        // Ouput the payment amounts in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Payment Amounts Found'));
    }
?>
