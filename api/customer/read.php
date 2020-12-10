<?php
    // File to read all customer entities

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to databse
    $database = New Database();
    $db = $database->connect();

    // Read all attributes from customer
    $sql = "SELECT * FROM customer";

    //formatting all customer sql into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Customer_id' => $row[0],
                'Phone' => $row[1],
                'Fname' => $row[2],
                'Lname' => $row[3]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        // Output customer data as json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Customers Found'));
    }
?>
