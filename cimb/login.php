<?php
include("../dbconn.php");
session_start();

?>
    <?php
  
  //$pick_up_date =$_POST['pick_up'];
  //$pick_hour  = $_POST['pick_hour'];
  //$pick_minute  = $_POST['pick_minute'];
 // $pick_location = $_POST['pick_loc'];

 // $return_date =$_POST['return'];
 // $return_hour  = $_POST['return_hour'];
 // $return_minute  = $_POST['return_minute'];
 // $return_location = $_POST['return_loc'];

 // $p_dd = substr($pick_up_date, 0,2);
  //$p_mm = substr($pick_up_date, 3,2);
  //$p_yy = substr($pick_up_date, 6,4);

 // $tarikh_pinjam = $p_yy.'-'.$p_mm.'-'.$p_dd;

  //$r_dd = substr($return_date, 0,2);
  //$r_mm = substr($return_date, 3,2);
  //$r_yy = substr($return_date, 6,4);

  //$tarikh_pulang = $r_yy.'-'.$r_mm.'-'.$r_dd;


 // $p_time = $pick_hour.':'.$pick_minute.':'.'00';
 // $r_time = $return_hour.':'.$return_minute.':'.'00';

 // $tarikh1 = $tarikh_pinjam.' '.$p_time;
 // $tarikh2 = $tarikh_pulang.' '.$r_time;

 // $diff = abs(strtotime($tarikh2) - strtotime($tarikh1)); 
  //$years   = floor($diff / (365*60*60*24)); 
 //$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
 // $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
 // $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
 // $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
  //$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 

  //$v_id = $_POST['v_id'];

$db = mysqli_connect("localhost","root","","crental");

      if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 $result_car = mysqli_query($db,"SELECT count(vehicle_id) as count FROM vehicle");







  $row_car = mysqli_fetch_assoc($result_car);

  $count = $row_car['count'];



  
  
?>


<?php

include("connection.php");//cimb2


$db = mysqli_connect("localhost","root","","crental");

      if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 
  

$result_v = mysqli_query($db,"SELECT * FROM vehicle WHERE vehicle_id ");



   

                  $row = mysqli_fetch_assoc($result_v);

                  $rate_day = $row['rate_day'];
                  $rate_hour = $row['rate_hour'];
                  
                
                               ?>
                            
            
                       
                               


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div img src="50.jpg"</div>
<title>CimbClicks</title>
</head>

<body>

<br />
<br />
<br />
<table>
<div align="center">
<img src="cimb.jpg"/>
<form action="logindb.php" method="post">
<input type="text" name="username" placeholder="Enter Username" />
<input type="password" name="pass" placeholder="Enter Password" />
<input type="submit" name="login" value="Log In">
<button onClick="window.open('indexafterlogin.php'); return false;">Cancel</button>
</form>
</div>
</table>
</div>
</body></html>