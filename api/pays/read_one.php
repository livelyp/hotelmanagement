<?php
    /*
        Add ?id=1 to get all pay relations connect to manager with employee id 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes from pays
    $sql = "SELECT * FROM pays";

    // get employee id from manager in url
    $Mgr_id = htmlspecialchars($_GET["id"]);

    //formatting employees that the manager need to pay into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[0] == $Mgr_id){
                $usr_item = array(
                    'Mgr_id' => $row[0],
                    'Employee_id' => $row[1]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        // Output matching manager pays relation in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No pays relation for this manager found'));
    }
?>
