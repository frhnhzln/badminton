<?php
include 'dbconn.php';
include 'dbcontroller.php';
include('includes/config.php');
session_start();
$db_handle = new DBController();

if(isset($_GET["booking_id"]))
{
    $id = $_GET["booking_id"];
    $getOrderDetail = "SELECT * FROM payment WHERE booking_id = '$id'";
    $result = mysqli_query($conn, $getOrderDetail);
	$row = mysqli_fetch_assoc($result);  
	
	$booking = "SELECT * FROM bookings WHERE booking_id = '".$id."'";
	$book = mysqli_query($conn, $booking);
	$bookduration = mysqli_fetch_assoc($book);  
	
    $studentName = "SELECT * FROM student WHERE student_id = '".$row['student_id']."'";
    $stuName = mysqli_query($conn, $studentName);
    $name = mysqli_fetch_assoc($stuName); 

    $carName = "SELECT * FROM car WHERE id = '".$row['car_id']."'";
    $carName = mysqli_query($conn, $carName);
    $car = mysqli_fetch_assoc($carName);
   
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CimbClicks</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
<img  align="middle" src="gambarclick.png"  alt="Cimb Clicks" style="width:100%;">
    <!--<?php echo $_SESSION['book_fee'];
    //echo $_SERVER["REQUEST_URI"];
    echo "<br/>";
    // qecho $_SESSION["return_url"];
	$cancel =  $_SESSION["return_url"];
    ?>-->
<br />
<br />
<br />


<br />
<h1 align="center">Your Booked Order Detail</h1>
<table id="example" class="table table-striped table-bordered" style="margin-left:12px;width:98% !important;">

	<thead>
		<tr>		
			<th>Booking Id</th>
			<th>Student Name</th>
			<th>Car Name</th>	
			<th>Booking Duration</th>		
			<th>Car Booking Rate</th>
			<th>Owner Rate</th>
			<th>Admin Rate</th>
		</tr>
	</thead>
	<tbody>
	<?php		
		echo "<tr>";
		
		echo "<td>" . $row["booking_id"] . "</td>";
		echo "<td>" . $name['name'] . "</td>";
		echo "<td>" . $car["name"] . "</td>";	
		echo "<td>" .$bookduration['booking_duration'] . "</td>";	
		echo "<td>" . $row["total_rate"] . "</td>";
		echo "<td>" . $row["owner_rate"] . "</td>";
		echo "<td>" . $row["admin_rate"] . "</td>";
		
	?>
		
	</tbody>
</table>



</body>
</html>
