<?php 

$con=mysqli_connect("localhost","root","","hotel_mg"); 

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT T.Type
FROM Room as R, Room_type as T
WHERE R.Type_id = T.Type_id");

echo "<table border='1'>
<tr>
<th>Room Type</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['Room Type'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>