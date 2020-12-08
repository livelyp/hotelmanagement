<?php 

$con=mysqli_connect("localhost","root","","cpsc471hms"); 

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT M.Employee_id, E.name FROM MANAGER AS M, STAFF AS S, EMPLOYEE AS E WHERE M.Employee_id = S.Mgr_id AND S.Employee_id = E.Employee_id");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['Employee_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>