<?php
    // File to read all employees in database 

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Conenect to database
    $database = New Database();
    $db = $database->connect();

    // Read all attributes for employees
    $sql = "SELECT * FROM employee";

    //formatting sql employee data into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            $usr_item = array(
                'Employee_id' => $row[0],
                'Name' => $row[1],
                'Phone' => $row[2],
                'Position' => $row[3]
            );

            array_push($usr_arr['data'], $usr_item);
        }

        // Ouput employee data in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'No Employees Found'));
    }
?>
