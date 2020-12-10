<?php
    /*
        Add ?id=1 to get all payment types  for customer 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    //Connect to database
    $database = New Database();
    $db = $database->connect();

    // select all attributes from amenity
    $sql = "SELECT * FROM amenity";

    // get the input from the url
    $Type = htmlspecialchars($_GET["type"]);

    //formatting the tuples that match Type input into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[1] == $Type){
                $usr_item = array(
                    'Number' => $row[0],
                    'Type' => $row[1],
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        // Ouput the matching tuples in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Amenity Found'));
    }
?>
