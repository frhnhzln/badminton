<?php
include("dbconn.php");
session_start();

$stu_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';
$car_id =  isset($_GET['car_id']) ? $_GET['car_id'] : '';

	if (isset($_POST['submit'])) {

		if($_POST['student_id'] != '' && $_POST['car_id'] != ''){

			 $start_timestamp =  strtotime($_POST['start_date'].' '.$_POST['start_time'])."<br/>";
			 $end_timestamp =  strtotime($_POST['end_date'].' '.$_POST['end_time']);

			$checkDateTime = "SELECT * FROM bookings WHERE NOT ((end_timestamp < '".$start_timestamp."') OR (start_timestamp > '".$end_timestamp."')) AND student_id = '".$_POST['student_id']."' AND car_id = '".$_POST['car_id']."'";

			// $checkDateTime = "SELECT * FROM bookings WHERE NOT ((end_date < '".$_POST['start_date']."') OR (start_date > '".$_POST['end_date']."')) AND student_id = '".$_POST['student_id']."' AND car_id = '".$_POST['car_id']."'";

			$checkResult = mysqli_query($conn, $checkDateTime);
			$checkRow = mysqli_num_rows($checkResult);

			//  echo $checkRow; exit;

			if($checkRow > 0){
				echo "<script> alert('This Time and Date alredy Boooked..!')</script>";
				echo "<script>window.location = 'fieldlists.php';</script>";
			} else {

				$student_id = $_POST['student_id'];
				$car_id = $_POST['car_id'];
				$start_date = $_POST['start_date'];
				$end_date = $_POST['end_date'];
				$start_time = $_POST['start_time'];
				$end_time = $_POST['end_time'];
				//$book_duration = $_POST['book_duration'];

				$start_timestamp =  strtotime($_POST['start_date'].' '.$_POST['start_time']);
				$end_timestamp =  strtotime($_POST['end_date'].' '.$_POST['end_time']);

				$query =  "INSERT INTO bookings (student_id, car_id, start_date, end_date, start_time, end_time, start_timestamp, end_timestamp)
				VALUES ('$student_id', '$car_id', '$start_date', '$end_date', '$start_time', '$end_time', '$start_timestamp', '$end_timestamp')";

				$result = mysqli_query($conn,$query);

				if(!$result)
				{
					echo "Insert Failed";
				}else
				{
					echo "<script> alert('Successfully added!')</script>";
					echo "<script> alert('Choose the car that you wish to book!')</script>";
					echo "<script>window.location = 'fieldlists.php';</script>";
				}
			}

		} else {

				$_SESSION['st_date'] = $_POST['start_date'];
				$_SESSION['en_date'] = $_POST['end_date'];
				$_SESSION['st_time'] = $_POST['start_time'];
				$_SESSION['en_time'] = $_POST['end_time'];
				$_SESSION['book_duration'] = $_POST['booking_duration'];

				echo "<script>window.location = 'fieldlists.php';</script>";

		}
	}


?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags-->
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Make a booking</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #0000FF;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #0000FF;
  color: white;
}

</style>
</head>


<body>


<style>
body {
  background-image: url('./assets/images/t4.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
<div class="topnav">
  <a class="active" href="indexx.php">Home</a>
  <a href="logout_c.php">Log Out</a>
  <div class="content">
                                    <!--<a class="js-acc-btn" href="index.php"><?php echo $_SESSION ['email']; ?></a>-->
                                </div>

								<div class="account-dropdown js-dropdown">

                                    <!--<div class="account-dropdown__footer">
                                        <a href="logout.php">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>-->


                                </div>
  <!--<?php
  echo " ".$_SESSION ['name']."";
  ?>-->
</div>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Home</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />



 <!-- MAIN CONTENT-->
 <div class="main-content">
   <div class="section__content section__content--p30">
   	<div class="page-wrapper">
        <div class="page-content--bge11">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">

	<div class="card">
			<div class="card-header">

				<strong>Field Booking</strong> Form</div>
				<center>
			<strong>Reminder!</strong> <br>
			Payment must be made to book the field. </center>
			<?php
				if($stu_id != '' && $car_id != ''){

					$getDetail = "SELECT * FROM bookings WHERE car_id = ".$car_id." AND student_id = ".$stu_id."";
					$result = mysqli_query($conn, $getDetail);
					$row = mysqli_fetch_assoc($result);
					$start_date = date('m-d-Y', strtotime($row['start_date']));
					$end_date = date('m-d-Y', strtotime($row['end_date']));
				}


			?>
			<div class="card-body card-block">
				<form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="student_id" value="<?php echo $stu_id; ?>">
					<input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
					<div class="row form-group">
						<div class="col col-md-4">
							<label  class=" form-control-label">Start Booking Date</label>
						</div>
						<div class="col-13 col-md-8">
							<input type="date" id="start_date" name="start_date" placeholder=" Date" class="form-control" required min="<?php echo date('Y-m-d'); ?>" >
						</div>
						</div>

						<!-- <div class="col col-md-4">
							<label  class=" form-control-label">End Booking Date</label>
						</div> -->
						<div class="col-13 col-md-8">
							<input type="hidden" id="end_date" name="end_date" placeholder=" Date" class="form-control" required min="<?php echo date('Y-m-d'); ?>" value="" readonly>
						</div>
						</div>


						<div class="row form-group">
						<div class="col col-md-4">
							<label  class=" form-control-label">Start Time</label>
						</div>

						<div class="col-13 col-md-8">
							<!-- <input type="time" id="start_time" name="start_time" placeholder="Time" class="form-control" required value=""> -->
							 <input type="time" id="start_time" name="start_time" placeholder="Time" class="form-control" required min="10:00" max="22:00" value="">
						</div>
						</div>

						<!--add duration-->
						<div class="row form-group">
							<div class="col col-md-4">
								<label class="form-control-label">Duration</label>
							</div>
							<div class="col-13 col-md-8">
								<select id="duration" name="booking_duration" class="form-control" required style="min-height:38px;">
									<option value="">Select Duration</option>
									<option value="1">1 hour</option>
									<option value="2">2 hours</option>
									<option value="3">3 hours</option>
									<option value="4">4 hours</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
						<div class="col col-md-4">
							<label  class=" form-control-label">End Time</label>
						</div>

						<div class="col-13 col-md-8">
							<input type="time" id="end_time" name="end_time" placeholder="Time" class="form-control" required value="" readonly>
						</div>
						</div>
						

					 	<button type="submit"  class="btn btn-primary btn-sm" value="submit " name="submit">
						<i class="fa fa-dot-circle-o"></i> Submit</button>
					</div>
				</form>
			<!--auto select end data-->
			<script>
				document.addEventListener('DOMContentLoaded', function() {
					var startDateInput = document.getElementById('start_date');
					var endDateInput = document.getElementById('end_date');
					if(startDateInput && endDateInput) {
						startDateInput.addEventListener('change', function() {
							endDateInput.value = this.value;
						});
					}
				});

				//auto calculate end time based on duration
				document.addEventListener('DOMContentLoaded', function() {
					var startTimeInput = document.getElementById('start_time');
					var durationInput = document.getElementById('duration');
					var endTimeInput = document.getElementById('end_time');

					function updateEndTime() {
						var startTime = startTimeInput.value;
						var duration = parseInt(durationInput.value);
						if (startTime && duration) {
							var parts = startTime.split(':');
							var startHour = parseInt(parts[0]);
							var startMinute = parseInt(parts[1]);
							var endHour = startHour + duration;
							if (endHour >= 24) endHour -= 24; // handle overflow
							var endTime = (endHour < 10 ? '0' : '') + endHour + ':' + (startMinute < 10 ? '0' : '') + startMinute;
							endTimeInput.value = endTime;
						} else {
							endTimeInput.value = '';
						}
					}

					startTimeInput.addEventListener('change', updateEndTime);
					durationInput.addEventListener('change', updateEndTime);
				});

				//user can select from 10am to 10pm only
				document.addEventListener('DOMContentLoaded', function() {
					// var startTimeInput = document.getElementById('start_time');
					var form = startTimeInput.form;

					// form.addEventListener('submit', function(e) {
					// 	var startTime = startTimeInput.value;
					// 	if (startTime) {
					// 		var parts = startTime.split(':');
					// 		var hour = parseInt(parts[0], 10);
					// 		if (hour < 10 || hour > 22) {
					// 			alert('Start Time must be between 10:00 AM and 10:00 PM only.');
					// 			e.preventDefault();
					// 			startTimeInput.focus();
					// 		}
					// 	}
					// });
					const startTime = document.getElementById('start_time');

					startTime.addEventListener('input', function () {
						if (startTime.validity.rangeUnderflow || startTime.validity.rangeOverflow) {
							startTime.setCustomValidity(
								'Value must be between 10:00 AM and 10:00 PM only'
							);
						} else {
							startTime.setCustomValidity('');
						}
					});
				});

				// document.querySelector('form').addEventListener('submit', function(e) {
				// 	e.preventDefault(); // <-- Add this line to prevent page reload
				// 	// Log all values
				// 	console.log("Start Booking Date:", document.getElementById('start_date').value);
				// 	console.log("Start Time:", document.getElementById('start_time').value);
				// 	console.log("Duration:", document.getElementById('duration').value);
				// 	console.log("End Time:", document.getElementById('end_time').value);
				// });
			</script>

    					</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div>

        </div>
            <!-- END MAIN CONTENT-->

</html>


<?php

// Declare and define two dates
$date1 = strtotime('$start_time');
$date2 = strtotime('$end_time');

// Formulate the Difference between two dates
$diff = abs($date2 - $date1);


// To get the year divide the resultant date into
// total seconds in a year (365*60*60*24)
$years = floor($diff / (365*60*60*24));


// To get the month, subtract it with years and
// divide the resultant date into
// total seconds in a month (30*60*60*24)
$months = floor(($diff - $years * 365*60*60*24)
							/ (30*60*60*24));


// To get the day, subtract it with years and
// months and divide the resultant date into
// total seconds in a days (60*60*24)
$days = floor(($diff - $years * 365*60*60*24 -
			$months*30*60*60*24)/ (60*60*24));


// To get the hour, subtract it with years,
// months & seconds and divide the resultant
// date into total seconds in a hours (60*60)
$hours = floor(($diff - $years * 365*60*60*24
	- $months*30*60*60*24 - $days*60*60*24)
								/ (60*60));


// To get the minutes, subtract it with years,
// months, seconds and hours and divide the
// resultant date into total seconds i.e. 60
$minutes = floor(($diff - $years * 365*60*60*24
		- $months*30*60*60*24 - $days*60*60*24
						- $hours*60*60)/ 60);


// To get the minutes, subtract it with years,
// months, seconds, hours and minutes
$seconds = floor(($diff - $years * 365*60*60*24
		- $months*30*60*60*24 - $days*60*60*24
				- $hours*60*60 - $minutes*60));
?>
