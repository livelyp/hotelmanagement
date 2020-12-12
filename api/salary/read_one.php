<?php
    /*
        Add ?id=1 to get salary for employee with id 1
    */

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    //read all attributes from salary
    $sql = "SELECT * FROM salary";

    // get employee id from url
    $Employee_id = htmlspecialchars($_GET["id"]);

    //formatting an employees salary into json
    if($result = $db -> query($sql)) {
        $usr_arr = array();
        $usr_arr['data'] = array();

        while($row = $result->fetch_row()) {

            if($row[0] == $Employee_id){
                $usr_item = array(
                    'Employee_id' => $row[0],
                    'Amount' => $row[1]
                );
    
                array_push($usr_arr['data'], $usr_item);
            }
        }

        // Output the employee's salary in json
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array('message' => 'Employees Salary Not Found'));
    }
?>
