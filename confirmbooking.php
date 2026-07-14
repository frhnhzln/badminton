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

    $studentName = "SELECT * FROM customer WHERE student_id = '".$row['student_id']."'";
    $stuName = mysqli_query($conn, $studentName);
    $name = mysqli_fetch_assoc($stuName);

    $carName = "SELECT * FROM field WHERE id = '".$row['id']."'";
    $carName = mysqli_query($conn, $carName);
    $car = mysqli_fetch_assoc($carName);

	$kereta = "SELECT name FROM field WHERE id = '".$row['id']."'";
	$kereta = mysqli_query($conn, $kereta);
	$namakereta = mysqli_fetch_assoc($kereta);

	$text_w = "Your field booking for *" .$car['name']. " (" .$car['id']. ")* on *" .$bookduration['start_date']. " " .date('h:i A',strtotime($bookduration['start_time']))."* is confirmed. Your *booking ID is $id*. Please show your booking ID to the staff at the counter 5 minutes before your rental starts. Thank you .";
	//$text_w = "Your car rental booking for " .$car['name']. " (" .$car['plate']. ") on  " .$bookduration['start_date']. " is confirmed. Your booking ID is $id . Please show your booking ID to the staff at the counter.";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking Summary</title>
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
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>
<body>



<img src="image/bdmntn logo only.png" alt="image" style="width: 160px; height: auto;">

</body>
</html>
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
<h1 align="center">Your Booking Detail</h1>
<table id="example" class="table table-striped table-bordered" style="margin-left:12px;width:98% !important;">

	<thead>
		<tr>
			<th>Booking Id</th>
			<th>Customer Name</th>
			<th>Field Name</th>
			<th>Field ID</th>
			<th>Booking Duration</th>
			<th>Booking Fee</th>

		</tr>
	</thead>
	<tbody>
	<?php



		echo "<tr>";
		echo "<td>" . $row["booking_id"] . "</td>";
		echo "<td>" . $name['name'] . "</td>";
		echo "<td>" . $car["name"] . "</td>";
		echo "<td>" . $car["id"] . "</td>";
		echo "<td>" .$bookduration['booking_duration'] . " Hours</td>";
		echo "<td>RM " . $row["total_rate"] . "</td>";


	?>

	</tbody>
</table>
<br><br>
<div class="card-body">
<?php
										echo "<td><a class='btn btn-info btn-round' target = '_blank' href='https://api.whatsapp.com/send?phone=".$name["phone"]."&text=".$text_w."&source=&data='>Send me the Booking ID!</a></td>";
										//echo "<a href='https://api.whatsapp.com/send?phone=". $name["phone"] ."&text=".$text_w."&source=&data=', target = '_blank'   >Back To Home</a>";

										//<!--<a href="indexx.php"  type="button" class="btn btn-primary btn-lg btn-block">Back To Home</a>-->
										echo "<td><a class='btn btn-info btn-round' target = '_self' href='indexx.php'>Home</a></td>";
										?>
                                    </div>


</body>
</html>
