<?php 

$con=mysqli_connect("localhost","root","","cpsc471hms"); 

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT M.Employee_id, A.name
FROM MANAGER AS M, STAFF AS S, EMPLOYEE AS E, EMPLOYEE as A
WHERE M.Employee_id = S.Mgr_id AND S.Employee_id = E.Employee_id AND A.Employee_id = M.Employee_id");
$jsonArray = array();

while($row = mysqli_fetch_assoc($result)){
    $jsonArray[] = $row;
}

echo(json_encode($jsonArray));

mysqli_close($con);

?>