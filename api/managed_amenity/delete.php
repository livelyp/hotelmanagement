<?php
    // File to delete managed amenity relation
    
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

    // Decode json input into an array data
    $data = json_decode(file_get_contents("php://input"), true);

    // sql to delete a matching managed anemity relation
    $sql = "DELETE FROM managed_amenity WHERE Employee_id=$data[Employee_id] and Number=$data[Number] and Type='$data[Type]'";

    // 
    if ($db->query($sql) === TRUE) {
        echo "Managed amenity relation deleted successfully";
    } else {
        echo "Error deleting managed amenity relation: " . $db->error;
    }

    $db->close();
?>
