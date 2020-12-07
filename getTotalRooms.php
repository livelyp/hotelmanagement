<?php 

$con=mysqli_connect("localhost","root","","hotel_mg"); 

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT R.Total_rooms
FROM Room_type as R
");

echo "<table border='1'>
<tr>
<th>Total Rooms</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['Total Rooms'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>