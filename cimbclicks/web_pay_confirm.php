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

$order_id = $_SESSION['order_id'];
$business = $_SESSION['business'];
$order_id = $_SESSION['neworderid'];
$cust_email = $_SESSION['cust_email'];
$amount = $_SESSION['amount'];
$return_url = $_SESSION['return_url'];
$user_id = $_SESSION['user'];//ok
$username = $_SESSION['username'];//ok
$deposit = $_SESSION['deposit'];//ok
$cancel_url = $_SESSION['return_url'];
?><br />
<br />

<h2>Nama user: <?php echo $username;?></h2>
<h3>Jumlah Simpanan: RM <?php echo $deposit;?></h3><br />
<br />
<h3>Pembayaran Untuk: <?php echo $business;?></h3>
<table>
<tr><th colspan="3" align="left">ID Pesanan: <?php echo $order_id;?></th></tr>
<tr><td>Email:</td><td>:</td><td><?php echo $cust_email;?></td></tr>
<tr><td>Jumlah:</td><td>:</td><td>RM <?php echo $amount;?></td></tr>
<tr><td><form action="" method="get"><button type="submit" name="confirm">Bayar</button></td><td></td><td><button onClick="window.open('<?php echo $cancel_url;?>','_self'); return false;">Batal</button></td></tr>

</table>

</body>
</html>
<?php  

if(isset($_GET['confirm'])){
	
	$balance = $deposit-$amount;
	$balance_update = mysqli_query($con, "UPDATE user SET user_deposit='$balance' where user_id='$user_id'");
	if($balance_update){
		
		$_SESSION['deposit'] = $balance;
		
	echo "<script>alert('Pembayaran Berjaya')</script>";
	echo "<script>window.open('confirm.php','_self')</script>";
	}
	
}

?>