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


<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Car Rental Portal</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<h1 align="center">Your Booked Order Detail</h1>
</body>
</html>

<html>
<head><title>Cars</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 

</head>
<body>

<form method="post" action="" enctype="multipart/form-data">  
<div class="container">
		
		
			


<br>
<br>
<input type="hidden" class="form-control" name="booking_fee" value="<?php echo $row["rate"]; ?>">
<table id="example" class="table table-striped table-bordered">

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


<br>


</form>
</body>							
