<?php
    /*
        Add ?id=1 to get all payment types  for customer 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    $database = New Database();
    $db = $database->connect();

    //read
    $sql = "SELECT * FROM payment_type";

    $Customer_id = htmlspecialchars($_GET["id"]);

    //formatting into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[1] == $Customer_id){
                $usr_item = array(
                    'Reservation_id' => $row[0],
                    'Customer_id' => $row[1],
                    'Type' => $row[2]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Payment Type Found'));
    }
?>