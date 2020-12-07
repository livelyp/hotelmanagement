<?php 

$con=mysqli_connect("localhost","root","","hotel_mg"); 

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT MAX(R.Room_price), R.Type
FROM Room_type as R

");

echo "<table border='1'>
<tr>
<th>Room Price</th>
<th>Room Type</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['Room Price'] . "</td>";
    echo "<td>" . $row['Room Type'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>