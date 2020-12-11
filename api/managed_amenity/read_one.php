<?php
    /*
        Add ?id=1 to get all managed amenities  for employee 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Read all attributes from managed amenity in databasse
    $sql = "SELECT * FROM managed_amenity";

    // Get employee id from url
    $Employee_id = htmlspecialchars($_GET["id"]);

    //formatting matching managed amenity into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[2] == $Employee_id){
                $usr_item = array(
                    'Number' => $row[0],
                    'Type' => $row[1],
                    'Employee_id' => $row[2]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }
    
        // Output all amenities managed by the given employee
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Amenities managed by this employee Found'));
    }
?>
