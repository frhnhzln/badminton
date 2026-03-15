<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","test","crh");

$sqlQuery = "SELECT booking_id, owner_rate FROM payment ORDER BY booking_id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>