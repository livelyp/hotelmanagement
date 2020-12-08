<?php
    /*
        Add ?id=1 to get customer with id 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    $database = New Database();
    $db = $database->connect();

    //read
    $sql = "SELECT * FROM customer";

    $Customer_id = htmlspecialchars($_GET["id"]);

    //formatting into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[0] == $Customer_id){
                $usr_item = array(
                    'Customer_id' => $row[0],
                    'Phone' => $row[1],
                    'Fname' => $row[2],
                    'Lname' => $row[3]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Customers Found'));
    }
?>