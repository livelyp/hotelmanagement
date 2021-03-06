<?php
    /*
        Add ?id=1 to get the cancel relation with cancellation_id = 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Read all attributes from cancel relation
    $sql = "SELECT * FROM cancel";

    // Get cancellation_id from url
    $Cancellation_id = htmlspecialchars($_GET["id"]);

    // Formatting matching cancel relation into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[2] == $Cancellation_id){
                $usr_item = array(
                    'Reservation_id' => $row[0],
                    'Customer_id' => $row[1],
                    'Cancellation_id' => $row[2]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        // Ouput the matching cancel relation in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Such Cancellation Found'));
    }
?>
