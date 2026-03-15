<?php
session_start();
include "connection.php";
include "dbconn.php";?>
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

<?php

$buaya = $_SESSION["buaya"];

$sql = ("SELECT * FROM bookings WHERE booking_id = '$buaya'");

$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){
	   while($row = mysqli_fetch_assoc($result)){


//$booking_fee = $result ["booking_fee"];
$booking_id = $_SESSION['booking_id'];
$email = $_SESSION['email'];
//$order_id = $_SESSION['order_id'];
//$business = $_SESSION['business'];
//$order_id = $_SESSION['neworderid'];
//$cust_email = $_SESSION['cust_email'];
$booking_fee =  $row["booking_fee"];
$_SESSION['return_url']="../confirmbooking.php?booking_id=$buaya";
$user_id = $_SESSION['user'];//ok
$username = $_SESSION['username'];//ok
$deposit = $_SESSION['deposit'];//ok
$cancel_url = $_SESSION['return_url'];


    }
    }

?><br />
<br />
<center>
<img src="../image/radia.png" alt="CRH" style="style=width:200px;height:200px;">

<h2>Username: <?php echo $username;?></h2>
<h3>Account Balance: RM <?php echo $deposit;?></h3>

<h3>Payment For: Football Field Reservation</h3></center>

<table id="example" class="table table-striped table-bordered" style="margin-left:12px;width:98% !important;">

	<thead>
		<tr>
			<th>Booking Id</th>
			<th>Email</th>
			<th>Total</th>
			<th>Action</th>



		</tr>
	</thead>
	<tbody>
	<?php



		echo "<tr>";
		echo "<td>" . $booking_id . "</td>";
		echo "<td>" . $email . "</td>";
		echo "<td> RM " . $booking_fee . "</td>";?>
		<td><form action="" method="get"><button type="submit" class="btn btn-primary" name="confirm">Pay</button> <button class="btn btn-danger" onClick="window.open('<?php echo $cancel_url;?>','_self'); return false;">Cancel</button></td><?php


		echo "<tr>";
	?>

	</tbody>
</table>

</body>
</html>
<?php

if(isset($_GET['confirm'])){

	$balance = $deposit-$booking_fee;
	$balance_update = mysqli_query($conn, "UPDATE user SET user_deposit='$balance' where user_id='$user_id'");
	if($balance_update){

		$_SESSION['deposit'] = $balance;

	echo "<script>alert('Payment Successful')</script>";
	echo "<script>window.open('confirm.php','_self')</script>";
	}

}

?>
