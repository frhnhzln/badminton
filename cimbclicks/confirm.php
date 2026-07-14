<?php 
session_start();
include("connection.php");
include "dbconn.php";



if(isset($_SESSION['deposit'])){
	$username = $_SESSION['username'];
	$balance = $_SESSION['deposit'];
	$buaya = $_SESSION["buaya"];
	//$business = $_SESSION['business'];
	//$order_id = $_SESSION['order_id'];
	//$trx_id = $_SESSION['neworderid'];
	//$cust_email = $_SESSION['cust_email'];
	//$amount = $_SESSION['pay_amount'];
	$return_url = $_SESSION['return_url'];
	$cancel_url = $_SESSION['return_url'];
	$user_id = $_SESSION['user'];
	$pay_date=date("Y-m-d H:i:s");
    $uq="UPDATE bookings SET booking_payment='paid' WHERE booking_id= '$buaya'";
    $run_update = mysqli_query($con, $uq);

   // $insert_trx_q="INSERT INTO payments(payment_id,student_id,total_rate,payment_time) VALUES('$trx_id',$order_id,$amount,'$pay_date')";
   // $run_trx=mysqli_query($con, $insert_trx_q);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmation</title>

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
<center>
	<img src="image/bdmntn logo only.png" alt="image" style="width: 160px; height: auto;">
<h1>Username: <?php echo $username;?></h1><br />
<h2>Balance: RM <?php echo $balance ?></h2><br />

<form action="<?php echo $return_url;?>" method="post">
<input type="hidden" name="trx_id" value="<?php echo $trx_id?>" />
<input type="hidden" name="order_id" value="<?php echo $order_id;?>" />

<input type="hidden" name="pay_date" value="<?php echo $pay_date;?>" />
<input class="btn btn-primary" type="submit" name="payment_success" value="Ok" />
</center>
</form>
</body>
</html>