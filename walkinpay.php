<?php
include 'dbconn.php';
session_start();
if(isset($_GET["booking_id"])){
	$g_code = $_GET["booking_id"];
	$sql = "SELECT * FROM bookings WHERE booking_id='$g_code'";
	$result_get = mysqli_query($conn, $sql);
	$booking_info = mysqli_fetch_assoc($result_get);

}else{
	echo "<script>alert('No booking id!');</script>";
}

if(isset($_POST["submit"])){
	$booking_payment = $_POST["status"];


	$sql = "UPDATE bookings SET booking_payment='$booking_payment' WHERE booking_id = '$g_code'";

	$result = mysqli_query($conn, $sql);

	if(!$result){
			echo "update failed";
	}else{
		echo "<script>alert('Payment received');</script>";
		echo "<script>window.open('bookingsadmin.php','_self')</script>";
	}
}

?>
<html>
<head><title>Booking Status</title></head>
<body><br><br><br><br>
<h1 align="center">Receive Payment</h1>
<?php include_once('includes/header_s.php');?>

</body>
<table id="example" class="table table-striped table-bordered">
        <thead>
        <tr>
                <th>Booking ID</th>
                <th>Customer ID</th>
                <th>Field ID</th>
				<th>Start Date</th>
                <th>End Date</th>
                <th>Start Time</th>
                <th>End Time </th>
                <th>Booking Duration</th>
                <th>Booking Fee</th>
                <th>Payment Status</th>

            </tr>
        </thead>
        <tbody>

		<?php
		//$sql = "SELECT * FROM student WHERE $g_code";
		//$result = mysqli_query($conn, $sql);
		//$num_rows = mysqli_num_rows($result);

				//if($row['owner_id']==$_SESSION['owner_id']){
				echo "<tr>";
				echo "<td>" . $booking_info["booking_id"] . "</td>";
				echo "<td>" . $booking_info["student_id"] . "</td>";
				echo "<td>" . $booking_info["id"] . "</td>";
                echo "<td>" . $booking_info["start_date"] . "</td>";
                echo "<td>" . $booking_info["end_date"] . "</td>";
                echo "<td>" . $booking_info["start_time"] . "</td>";
                echo "<td>" . $booking_info["end_time"] . "</td>";
                echo "<td>" . $booking_info["booking_duration"] . " Hours </td>";
                echo "<td>RM " . $booking_info["booking_fee"] . "</td>";
                echo "<td>" . $booking_info["booking_payment"] . "</td>";
				echo "</tr>";



		?>

</table>
</html>


    <form action="" method="post" enctype="multipart/form-data" >


  <p>
  <input name="status" type="hidden" value="paid"/>
  </p>
  <p align="center">
    <input type="submit" name="submit" />
  </p>
  <p align="center"><a  class='btn btn-danger' href='bookingsadmin.php' onclick='return confirm('are you sure?');'>back</a></p>
</form>
