<?php 
session_start();
include("connection.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CimbClicks</title>
</head>

<body>

<?php
$student_id = $_SESSION["student_id"];
 $buaya = $_SESSION["buaya"];
 //echo $_SESSION["buaya"];
if(isset($_SESSION['user'])){
	$run = mysqli_query($con, "SELECT booking_id, car_id, start_date, end_date, start_time, end_time, booking_duration, booking_fee 
	FROM bookings  where  booking_id= $buaya");
	$row1=mysqli_fetch_array($run);
	//echo "<pre>";
	//print_r($row1) ;

	$_SESSION['order_id']=$row1['booking_id'];		
	$_SESSION['neworderid']=rand(1000,10000);
	$_SESSION['cust_email']=$row1['email'];
	$_SESSION['pay_amount']=$row1['booking_fee'];
	$_SESSION['return_url']="../booking_confirm.php";
	$_SESSION['business']=$row1['name'];


	$order_id = $_SESSION['order_id'];
	$business = $_SESSION['business'];
	$cust_email = $_SESSION['cust_email'];
	$amount = $_SESSION['pay_amount'];
	$return_url = $_SESSION['return_url'];
	$user_id = $_SESSION['user'];//ok
	$username = $_SESSION['username'];//ok
	$deposit = $_SESSION['deposit'];//ok
	$cancel_url = $_SESSION['return_url'];
}

?><br />
<br />

<h2>User Name: <?php echo $username;?></h2>
<h3>Account Balance: RM <?php echo $deposit;?></h3><br />
<br />
<h3>Payment For: <?php echo $business;?></h3>
<table>
<tr><th colspan="3" align="left">Registration ID: <?php echo $order_id;?></th></tr>
<tr><td>Email:</td><td>:</td><td><?php echo $cust_email;?></td></tr>
<tr><td>Total:</td><td>:</td><td>RM <?php echo $amount;?></td></tr>
<tr><td><form action="" method="get"><button type="submit" name="confirm">Pay</button></td><td></td><td><button onClick="window.open('<?php echo $cancel_url;?>','_self'); return false;">Cancel</button></td></tr>

</table>

</body>
</html>
<?php  

if(isset($_GET['confirm'])){
	
	if($amount>$deposit){
		echo "<script>alert('Insufficient Balance')</script>";die;
	}
	$balance = $deposit-$amount;
	$balance_update = mysqli_query($con, "UPDATE user SET user_deposit='$balance' where user_id='$user_id'");
	if($balance_update){
		
		$_SESSION['deposit'] = $balance;
		
	echo "<script>alert('Payment Successfull')</script>";
	echo "<script>window.open('confirm.php','_self')</script>";
	}
	
}

?>