<?php

$ID= $_POST["Customer ID"];
$points = $_POST["points"];

// Create connection
$con=mysqli_connect("localhost","root","","hotel_mg");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "UPDATE Member as M SET M.points = M.points + '".$points."' where M.Customer_id=" .$ID;
$result = mysqli_query($con,$sql);
mysqli_close($con);

?>