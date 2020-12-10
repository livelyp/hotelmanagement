<?php
    // File to delete an amenity from data base
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    // Connect to the database
    $database = New Database();
    $db = $database->connect();

    // Decode the json input from the api
    $data = json_decode(file_get_contents("php://input"), true);

    // sql to delete a record
    $sql = "DELETE FROM amenity WHERE Number=$data[Number] and Type='$data[Type]'";

    // Output the result of the delete operation
    if ($db->query($sql) === TRUE) {
        echo "Amenity deleted successfully";
    } else {
        echo "Error deleting amenity: " . $db->error;
    }

    $db->close();
?>
