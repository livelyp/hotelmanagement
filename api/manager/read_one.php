<?php
    /*
        Add ?id=1 to get manager with employee id 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Read all attributes from manager
    $sql = "SELECT * FROM manager";

    // Get input employee id from url
    $Employee_id = htmlspecialchars($_GET["id"]);

    //formatting matching manager into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[0] == $Employee_id){
                $usr_item = array(
                    'Employee_id' => $row[0],
                    'Username' => $row[1],
                    'Pword' => $row[2]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        // Output the matching manager into json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Manager Found'));
    }
?>
