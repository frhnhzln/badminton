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
	$car_id = $_POST ['id'];
	$start_date =$_POST['start_date'];
	$end_date =$_POST['end_date'];
	$start_time =$_POST['start_time'];
	$end_time =$_POST['end_time'];
	//$book_duration = $_POST['book_duration'];
	
	$query =  "INSERT INTO bookings (student_id, car_id, start_date, end_date, start_time, end_time) 
		VALUES ('$student_id', '$car_id', '$start_date', '$end_date', '$start_time', '$end_time')";
		
		$result = mysqli_query($conn,$query);
	
		if(!$result)
		{
			echo "Insert Failed";
		}else
		{
			echo "<script> alert('Successfully added!')</script>";
			echo "<script>window.open('cimbclicks/login.php','_self')</script>";
		}
}


?>
<form method="post" action="" enctype="multipart/form-data">  
<div class="container">
		
		
			
<br><br>
<input type="text" class="form-control" name="student_id" value="<?php echo $_SESSION['student_id']; ?>">
<input type="text" class="form-control" name="id" value="<?php echo $_SESSION['id']; ?>">
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
