<?php
$employee_id = $_POST["employee_id"];
$raisePercent = $_POST["raisePercent"];

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

$sql = "UPDATE salary SET amount = (amount + (($raisePercent/100) * amount)) WHERE employee_id = $employee_id";

$retval = mysqli_query($con, $sql);

if(! $retval ) {
die("Could not update data: " . mysqli_error($con));
}

echo "Updated data successfully" . PHP_EOL;
mysqli_close($con);
?>
