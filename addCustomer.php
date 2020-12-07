<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];

// only submit if all values are filled in
if (!empty($fname) || !empty($lname) || !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "cpsc471hms";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
      $INSERT = "INSERT Into customer (fname, lname, phone) values(?, ?, ?)";
      //Prepare statement
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $fname, $lname, $phone);
      $stmt->execute();
      echo "New customer inserted sucessfully";
      $stmt->close();
      $conn->close();
    }
} else {
 echo "Please fill in all fields.";
 die();
}
?>