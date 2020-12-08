<?php
$employee_id = $_POST["employee_id"];

// Create connection
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "cpsc471hms";
$con=mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

// Check connection
if (mysqli_connect_error()) {
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}

// $result = mysqli_query($con,"Delete from Users where ID=". $ID );
// mysqli_close($con);

$sql = "DELETE FROM staff WHERE employee_id = $employee_id";
   
if (mysqli_query($con, $sql)) {
  echo "Staff deleted successfully";
  echo "<br>";
  // if staff was deleted successfully, we can attempt to delete the same
  // employee from the employee database
  $sqlEmp = "DELETE FROM employee WHERE employee_id = $employee_id";
  if (mysqli_query($con, $sqlEmp)) {
    echo "Employee entry of staff deleted successfully";
    echo "<br>";
  } else {
    echo "Error deleting employee: " . mysqli_error($con);
  }
} else {
  echo "Error deleting staff: " . mysqli_error($con);
}
mysqli_close($con);
?>
