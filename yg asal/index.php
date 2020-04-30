<?php
include("dbconn.php");
session_start();
//$student_id=$_SESSION['student_id'];
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
<!--href='up_car.php?id=" . $row["id"]-->
<div class="topnav">
  <a class="active" href="index.php">Booking Details</a>
  <a href="carlist.php">Car List</a>
  <a href="up_cust.php">Update Profile</a>
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
			
				<strong>Car Rental</strong> Form</div>
				<center>	
			<strong>Reminder!</strong> <br>
			Payment must be made to book the car. </center>
			<div class="card-body card-block">
				<form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal" >
								
								
								
								
					<div class="row form-group">
						<div class="col col-md-4">
							<label  class=" form-control-label">Start Booking Date</label>
						</div>
						<div class="col-13 col-md-8">
							<input type="date" id="start_date" name="start_date" placeholder=" Date" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
						</div>
						</div>

						<div class="col col-md-4">
							<label  class=" form-control-label">End Booking Date</label>
						</div>
						<div class="col-13 col-md-8">
							<input type="date" id="end_date" name="end_date" placeholder=" Date" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
						</div>
						</div>
						

						<div class="row form-group">
						<div class="col col-md-4">
							<label  class=" form-control-label">Start Time</label>
						</div>
						<div class="col-13 col-md-8">
							<input type="time" id="start_time" name="start_time" placeholder="Time" class="form-control" required>
						</div>
						</div>

						<div class="row form-group">
						<div class="col col-md-4">
							<label  class=" form-control-label">End Time</label>
						</div>
						<div class="col-13 col-md-8">
							<input type="time" id="end_time" name="end_time" placeholder="Time" class="form-control" required>
						</div>
						</div>
						
						
						
						
						
					
					 <button type="submit"  class="btn btn-primary btn-sm" value="submit " name="submit"> 
						<i class="fa fa-dot-circle-o"></i> Submit</button>                                      
				</div>	
			
									</form>
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

	
	if(isset($_POST['submit']))
	{
		if(isset($_SESSION["cart_item"]))
		{
			$item_array_id = array_column($_SESSION["cart_item"], "item_id");
			if(!in_array($_GET["id"], $item_array_id))
			{	
			$count = count ($_SESSION["cart_item"]);
			$item_array = array(
				'start_date'	=> $_POST["start_date"],
				'end_date'  	=> $_POST["end_date"],
				'start_time'	=> $_POST["start_time"],
				'end_time'  	=> $_POST["end_time"]
				
			);
			$_SESSION ["cart_item"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}

		//$_SESSION['start_date'] = $_POST['start_date'];
		//$_SESSION['end_date'] = $_POST['end_date'];
		//$_SESSION['start_time'] = $_POST['start_time'];
		//$_SESSION['end_time'] = $_POST['end_time'];
		//$student_id = $_SESSION ['student_id'];
		//$booking_id = $_POST['booking_id'];
		
		//$start_date = $_POST['start_date'];   
		//$end_date = $_POST['end_date'];  
		//$start_time = $_POST['start_time'];
		//$end_time = $_POST['end_time'];
      
        

		//$insert_c = "INSERT into reservation
		//(student_id,start_date,end_date,start_time,end_time) VALUES 
		//('$student_id','$start_date','$end_date','$start_time','$end_time')";
		//$run_c = mysqli_query($conn, $insert_c);	
        

		{
			echo "<script> alert('Choose the car that you wish to book!')</script>";
			echo "<script>window.open('carlists.php','_self')</script>";
		}
		{
			{
			echo "<script> alert('Failed to find cars!')</script>";

           }
    }
	}