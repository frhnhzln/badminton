<?php include 'dbcontroller.php';
 include 'connectdb.php';
 include './connection.php';
 
session_start();



?><?php require 'bootstrap.php';?>
    <?php
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];
  


?>
<?php 

$db = mysqli_connect("localhost","root","","crh");

      if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sdata = $booking_id;
 $result_d = mysqli_query($db,"SELECT * FROM bookings WHERE booking_id = $sdata");


    $row_d = mysqli_fetch_array($result_d);
    $option_deposit = $row_d['value'];
?>
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

$char=$_SESSION['char'];

$order_id = $_SESSION['neworderid'];
$user_id = $_SESSION['user'];
//echo $user_id;
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$amount = $_SESSION['amount'];
$return_url = $_SESSION['return_url'];


$deposit = $_SESSION['deposit'];//ok
$cancel_url = $_SESSION['return_url'];
?><br />
<br />
<div align="center">
    <img id="logo" src="cimb.jpg" />
<br>
<h3>UserName:</h3> <?php echo $username;?>



<h3>Account Saving:</h3> RM <?php echo $deposit;?>

<h3>Booking Confirmation:</h3>  <?php echo $char;?>

  
                    
    <h3><tr><td>Total To Pay: </td> <span></h3>
              
                            
                             <!-- <?php 

$result_v = mysqli_query($db,"SELECT * FROM vehicle WHERE vehicle_id = '$v_id'");



   

                  $row = mysqli_fetch_assoc($result_v);

                  $rate_day = $row['rate_day'];
                  $rate_hour = $row['rate_hour'];
                  $a = ((($hours * $rate_hour) +($days * $rate_day)) * ($option_deposit/100));
                
                               ?>-->
                            
                            <span>
                                <th><?php echo 'RM'.$amount; ?>
                            </span> 
                        
                        
                      
    <br><br>
<br><tr><td><form action="" method="get"><button type="submit" name="confirm">Pay Now</button></td><td></td><td><button onClick="window.open('<?php echo $cancel_url;?>','_self'); return false;">Batal</button></td></tr>
</div>
</table>

</body>
</html>
<?php  

if(isset($_GET['confirm'])){
	
	$balance = $deposit-$amount;
	$balance_update = mysqli_query($conn, "UPDATE user SET user_deposit='$balance' where user_id='$user_id'");
	if($balance_update){
		
		$_SESSION['deposit'] = $balance;
		
	
      
      $sql= mysqli_query($con,"UPDATE payment SET status='Paid' where confirmation='$char'");
          echo "<script>alert('Payment Successful')</script>";
	echo "<script>window.open('confirm.php','_self')</script>";
        }
        
        }
	


?>