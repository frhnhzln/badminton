<?php
include 'dbconn.php';
include 'dbcontroller.php';
include('includes/config.php');
session_start();
$db_handle = new DBController();
//$student_id=$_SESSION['student_id'];
//$_SESSION['student_id'];
	
if(isset($_GET["id"]))
				{
				$id=$_GET["id"];
				$query = "SELECT * FROM car WHERE id='$id'";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
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

<h1 align="center">Please confirm your booking before proceeding to payment</h1>
</body>
</html>

<html>
<head><title>Cars</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 

</head>
<body>
<?php

if(isset($_POST['submit']))
{
	
	//$id = $_POST['id'];
	$student_id = $_POST["student_id"];
	$car_id = $id;
	$start_date =$_POST['start_date'];
	$end_date =$_POST['end_date']; 
	$start_time =$_POST['start_time'];
	$end_time =$_POST['end_time'];
	//$hours = $_POST['book_duration'];
	//$hours =$_POST['book_duration'];
	//$book_duration = $_POST['book_duration'];
	
	$query =  "INSERT INTO bookings (student_id, car_id, start_date, end_date, start_time, end_time) 
		VALUES ('$student_id', '$car_id', '$start_date', '$end_date', '$start_time', '$end_time')";
		
		$result = mysqli_query($conn,$query);
	
		if(!$result)
		{
			echo "Insert Failed";
		}else
		{
			echo "<script> alert('Successful! Please proceed to payment to confirm booking!')</script>";
			echo "<script>window.open('cimbclicks/login.php','_self')</script>";
		}
}


?>
<form method="post" action="" enctype="multipart/form-data">  
<div class="container">
		
		
			
<br><br>
<input type="text" class="form-control" name="student_id" value="<?php echo $_SESSION['student_id']; ?>">
<input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
<table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Start Time</th>
		<th>End Time</th>
		<th>Duration</th>
		<th>Booking Fee</th>
		
            </tr>
        </thead>
        <tbody>
		<tr>
			<td><input type="text" class="form-control" name="start_date" value="<?php echo $_SESSION['start_date']; ?>"></td>
			<td><input type="text" class="form-control" name="end_date" value="<?php echo $_SESSION['end_date']; ?>"></td>
			<td><input type="text" class="form-control" name="start_time" value="<?php echo $_SESSION['start_time']; ?>"></td>
			<td><input type="text" class="form-control" name="end_time" value="<?php echo $_SESSION['end_time']; ?>"></td>
			<td><input type="text" class="form-control" name="end_time" value="<?php echo '' ?>"></td>
			<td><input type="text" class="form-control" name="end_time" value="<?php echo '' ?>"></td>
			
		</tr>
		<?php
		// $time1 = start_time('$start_time');
		 //$time2 = end_time('$end_time');
		 //$book_duration = round(abs($time2 - $time1) / 3600,2);
		 //echo $book_duration;
 
				
				//echo "<tr>";
				//echo "<td>" . $_SESSION['start_date'] . "</td>";
				//echo "<td>" . $_SESSION['end_date'] . "</td>";
				//echo "<td>" . $_SESSION['start_time'] . "</td>";
				//echo "<td>" . $_SESSION['end_time'] . "</td>";
				//echo "<td>" . $_SESSION['book_duration'] . "</td>";
				//echo "<td>" . "</td>";
				//echo $_SESSION['book_duration'];
					
		
		?>
		
		</tbody>
</table>

<div class="card-body">
                                        <a class="btn btn-danger" href="index.php" role="button">Edit Details</a>
                                       
                                    </div>

<br>
<br>
<table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Car Image</th>
                <th>Car Name</th>
                <th>Seat Number</th>
		<th>Car Colour</th>
		<th>Car Booking Rate</th>
		<th>Car Year Made</th>
		<th>Car Description</th>
            </tr>
        </thead>
        <tbody>
		<?php
		
				echo "<tr>";
				echo "<td>" . "<img src='image/cars/".$row['image']."' width ='200' height = '200'>". "</td>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td>" . $row["seat"] . "</td>";
				echo "<td>" . $row["colour"] . "</td>";
				echo "<td>" . $row["rate"] . "</td>";
				echo "<td>" . $row["year"] . "</td>";
				echo "<td>" . $row["info"] . "</td>";
				
				
					
		
		?>
		
		</tbody>
</table>
				
<div class="card-body">
                                        <a class="btn btn-danger" href="carlists.php" role="button">Change Car</a>
                                       
                                    </div>


<br>

<div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Pay for Booking</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
</form>
</body>							
<?php
  

  
  $pick_up_date =$_POST['pick_up'];
  $pick_hour  = $_POST['pick_hour'];
  $pick_minute  = $_POST['pick_minute'];
  $pick_location = $_POST['pick_loc'];

  $return_date =$_POST['return'];
  $return_hour  = $_POST['return_hour'];
  $return_minute  = $_POST['return_minute'];
  $return_location = $_POST['return_loc'];

  $p_dd = substr($pick_up_date, 0,2);
  $p_mm = substr($pick_up_date, 3,2);
  $p_yy = substr($pick_up_date, 6,4);

  $tarikh_pinjam = $p_yy.'-'.$p_mm.'-'.$p_dd;

  $r_dd = substr($return_date, 0,2);
  $r_mm = substr($return_date, 3,2);
  $r_yy = substr($return_date, 6,4);

  $tarikh_pulang = $r_yy.'-'.$r_mm.'-'.$r_dd;


  $p_time = $pick_hour.':'.$pick_minute.':'.'00';
  $r_time = $return_hour.':'.$return_minute.':'.'00';

  $tarikh1 = $tarikh_pinjam.' '.$p_time;
  $tarikh2 = $tarikh_pulang.' '.$r_time;

  $diff = abs(strtotime($tarikh2) - strtotime($tarikh1)); 
  $years   = floor($diff / (365*60*60*24)); 
  $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
  $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
  $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
  $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 

?>
    
    <br>
 <div align="center">  <p><b><h3>CHOOSE YOUR CAR</h3></b></p></div><br>
<div class="container layoutcontainer breadcrumb">
<form class="form-horizontal" method="post" name="form1" id="form1" action="checkout.php">

  <input name="pick_up"  type="hidden" value="<?php echo $pick_up_date ?>" />
  <input name="pick_hour"  type="hidden" value="<?php echo $pick_hour ?>" />
  <input name="pick_minute"  type="hidden" value="<?php echo $pick_minute ?>" />
  <input name="pick_loc"  type="hidden" value="<?php echo $pick_location ?>" />
  <input name="return"  type="hidden" value="<?php echo $return_date ?>" />
  <input name="return_hour"  type="hidden" value="<?php echo $return_hour ?>" />
  <input name="return_minute"  type="hidden" value="<?php echo $return_minute ?>" />
  <input name="return_loc"  type="hidden" value="<?php echo $return_location ?>" />

  <div>

  <div class="booking_detail" id="booking_detail">

    <table style="width:250px;border:solid 1px #CCC" border="0" class="table table bordered breadcrumb">
      <tr>
        <th colspan="2" style="text-align:left;background:#0E62A2;color:white"><font size="2px">Booking details</font></th>
      </tr>
      <tr>
        <th>Time and Place</th>
        <td><a href="reservation.php"><i class="icon icon-edit "></i>Change</a></td>
      </tr>
      <tr>
        <td>Pick-up:</td>
        <td><?php echo $pick_location.'<br>'.$pick_up_date.' '.$p_time ?></td>
      </tr>
      <tr>
        <td>Return:</td>
        <td><?php echo $return_location.'<br>'.$return_date.' '.$r_time ?></td>
      </tr>
      <tr>
        <td>Rental Duration:</td>
        <td>

          <?php 
              if($days!=0 && $hours!=0 ){
                echo $days.' day, ' .$hours.' hour';
              } 
              elseif($days==0 && $hours!=0 ){
                echo $hours.' hour';
              }
              elseif($days!=0 && $hours==0 ){
                echo $days.' day';
              }
          ?>
          
        </td>
      </tr>
    </table>

  </div>