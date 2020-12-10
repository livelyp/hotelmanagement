<?php
    // File to delete employee entity

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    // Get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Decode json input for employee id
    $data = json_decode(file_get_contents("php://input"), true);

    // sql to delete a employee matching employee id input
    $sql = "DELETE FROM employee WHERE Employee_id=$data[Employee_id]";

    // Output result of delete operaton
    if ($db->query($sql) === TRUE) {
        echo "Employee deleted successfully";
    } else {
        echo "Error deleting employee: " . $db->error;
    }

    $db->close();
?>
