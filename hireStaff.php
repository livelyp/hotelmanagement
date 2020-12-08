<?php
$employee_id = $_POST['employee_id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$position = $_POST['position'];
$mgr_id = $_POST['mgr_id'];
$amount = $_POST['amount'];

// only submit if all values are filled in
if (!empty($employee_id) || !empty($name) || !empty($phone) || !empty($position)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "cpsc471hms";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {

      $INSERT = "INSERT Into employee (employee_id, name, phone, position) values(?, ?, ?, ?)";

      // attempt to add employee database and handle errors
      if (false === ($stmt = $conn->prepare($INSERT))) {
        echo 'error preparing statement: ' . $conn->error;
      } elseif (!$stmt->bind_param("isss", $employee_id, $name, $phone, $position)) {
        echo 'error binding params: ' . $stmt->error;
      } elseif (!$stmt->execute()) {
        echo 'error executing statement: ' . $stmt->error;
      } else {
        echo "New employee added sucessfully";
        echo "<br>";
        $stmt->close();

        // if inserting employee is successful, can try to insert staff
        $SELECT = "SELECT employee_id From manager Where employee_id = ? Limit 1";
        $INSERTSTAFF = "INSERT Into staff (employee_id, mgr_id) values(?, ?)";


        // checks whetehr manager being referenced exists
        if (false === ($stmt = $conn->prepare($SELECT))) {
          echo 'error preparing statement: ' . $conn->error;
        } elseif (!$stmt->bind_param("i", $mgr_id)) {
          echo 'error binding params: ' . $stmt->error;
        } elseif (!$stmt->execute()) {
          echo 'error executing statement: ' . $stmt->error;
        } else {
          $stmt->store_result();
          $stmt->store_result();
          $stmt->fetch();
        }
        $rnum = $stmt->num_rows;
        if ($rnum==0) {
          echo "The manager id you referenced does not exist.";
        } else {
          $stmt->close();

          // attempt to add staff database and handle errors
          if (false === ($stmt = $conn->prepare($INSERTSTAFF))) {
            echo 'error preparing statement: ' . $conn->error;
          } elseif (!$stmt->bind_param("ii", $employee_id, $mgr_id)) {
            echo 'error binding params: ' . $stmt->error;
          } elseif (!$stmt->execute()) {
            echo 'error executing statement: ' . $stmt->error;
          } else {
            echo "New staff added sucessfully";
            echo "<br>";
            $stmt->close();


            // if insertion of staff was successful, attempt to insert a new staff salary
            $INSERTSALARY = "INSERT Into salary (employee_id, amount) values(?, ?)";

            // attempt to insert salary to database and handle errors
            if (false === ($stmt = $conn->prepare($INSERTSALARY))) {
              echo 'error preparing statement: ' . $conn->error;
            } elseif (!$stmt->bind_param("ii", $employee_id, $amount)) {
              echo 'error binding params: ' . $stmt->error;
            } elseif (!$stmt->execute()) {
              echo 'error executing statement: ' . $stmt->error;
            } else {
              echo "New salary added sucessfully";
              echo "<br>";
            }
          }
        }
      }
      $stmt->close();
      $conn->close();
    }
} else {
  echo "Please fill in all fields.";
  die();
}
?>