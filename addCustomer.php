<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cpsc471hms');

// Create connection 
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME); 

// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

echo "add customer page";

// query all customers
// for debugging purposes
$result = mysqli_query($con, "SELECT * FROM customer");
echo "<table border='1'>
<tr>
<th>customerID</th>
<th>Phone</th>
<th>Fname</th>
<th>Lname</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Customer_id'] . "</td>";
echo "<td>" . $row['Phone'] . "</td>";
echo "<td>" . $row['Fname'] . "</td>";
echo "<td>" . $row['Lname'] . "</td>";
}
?>

<html>
<! -- Form to insert new customer -->
<body>
<div>
<form action="addCustomer.php" method="post">
First Name: <input type="text" name="fname">
Last Name: <input type="text" name="lname">
Phone number: <input type="text" name="phone">
<input name="submitCustomer" type="submit">
</form>
</div>

<div>
<?
// values to add to customer table
// references name from text input
$phone = $_POST["phone"];
$fname = (string)$_POST["fname"];
$lname = (string)$_POST["lname"];


// after submit button is cliecked
if (isset($_POST["submitCustomer"])) {
  echo "Submit button pressed";
  $sql = "INSERT INTO customer (`Phone`, `Fname`, `Lname`) VALUES ($phone, $fname, $lname)";
  if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
  }
  else {
    echo "1 record added";
  }
?>
</div>
</body>
</html>
