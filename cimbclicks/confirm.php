<?php 
session_start();
include("connection.php");

$username = $_SESSION['username'];
$balance = $_SESSION['deposit'];

$business = $_SESSION['business'];
$order_id = $_SESSION['neworderid'];
$cust_email = $_SESSION['cust_email'];
$amount = $_SESSION['amount'];
$return_url = $_SESSION['return_url'];
$cancel_url = $_SESSION['return_url'];
$user_id = $_SESSION['user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Done</title>
</head>

<body>

Nama user: <?php echo $username;?><br />
Baki Akaun: RM <?php echo $balance ?><br />

<form action="<?php echo $return_url;?>" method="get">
<input type="hidden" name="trx_id" value="<?php echo rand(1000,10000)?>" />
<input type="hidden" name="order_id" value="<?php echo $order_id;?>" />
<input type="hidden" name="amount" value="<?php echo $_SESSION['amount'];?>" />
<input type="hidden" name="pay_date" value="<?php echo date("Y-m-d H:i:s");?>" />
<input type="submit" name="success" value="Tutup" />

</form>
</body>
</html>