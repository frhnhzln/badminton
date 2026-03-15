<?php
include 'dbconn.php';

SESSION_START();
if(isset($_GET["delete"])){
	$booking_id= $_GET["id"];

	$sql = "DELETE FROM bookings WHERE booking_id = '$booking_id'";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo "<script>alert('Booking Cancelled');</script>";
	}else{
	echo "<script>alert('Cancellation Failed');</script>";
	}
}

//echo "Welcome, ".$_SESSION ['name']."";

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>KV RHINO</title>
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

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->

<!--Header-->
<?php include('includes/header_index.php');?>
<!-- /Header -->
  <!--<?php
  echo " ".$_SESSION ['name']."";
  ?>-->
</div>



</body>
</html>

<html>
<head><title>My Bookings</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<form method="get" action="cars.php" enctype="multipart/form-data">

</head>
<body>
<div class="container">
			<br />
			<br />
			<br />
			<h1 align="center">My Bookings History</h1>
<br><br><br>

<table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Field ID</th>
                <th>Start Date</th>
				<th>End Date</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Booking Duration</th>
				<th>Booking Fee</th>
                <th>Payment Status</th>

                <th>Cancel Booking</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$sql = "SELECT * FROM bookings ORDER BY start_date";
		$result = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($result);


		if($num_rows > 0){

			while($row = mysqli_fetch_assoc($result)){
				if($row['student_id']==$_SESSION['student_id']){
				echo "<tr>";
				echo "<td>" . $row["booking_id"] . "</td>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["start_date"] . "</td>";
				echo "<td>" . $row["end_date"] . "</td>";
				echo "<td>" . $row["start_time"] . "</td>";
                echo "<td>" . $row["end_time"] . "</td>";
                echo "<td>" . $row["booking_duration"] . " Hour(s)</td>";
                echo "<td>RM " . $row["booking_fee"] . "</td>";
                echo "<td>" . $row["booking_payment"] . "</td>";




        $currentDateTime = date('Y-m-d');
        $dt = new DateTime();
        echo "<td>" .$action = "";
                if ($row["start_date"] < $currentDateTime ){
                  $action = "disabled";
                }
                if ($row["start_date"] > $currentDateTime ){
        echo "<a  class='btn btn-danger' href='mybooking.php?delete&id=" . $row["booking_id"] . "' onclick='return confirm('are you sure?');'>Cancel</a></td>";    }
        echo "</tr>";

			}
		}}

		?>
		</tbody>
</table>


<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>
</html>
