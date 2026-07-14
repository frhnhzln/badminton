<?php
include 'dbconn.php';

SESSION_START();
if(isset($_GET["booking_id"])){
    $g_code = $_GET["booking_id"];
    //$student_id= $_GET["student_id"];

	$sql = "SELECT * FROM bookings WHERE booking_id = '$g_code'";
    $result_get = mysqli_query($conn, $sql);
    $booking_info = mysqli_fetch_assoc($result_get);

    $stdName = "SELECT * FROM customer WHERE student_id = '".$booking_info['student_id']."'";
    $stdName = mysqli_query($conn, $stdName);
    $std = mysqli_fetch_assoc($stdName);
	//if($result){
	//	echo "<script>alert('Delete success');</script>";
	//}else{
	//echo "<script>alert('Delete failed');</script>";

}

//echo "Welcome, ".$_SESSION ['name']."";

?>
<!DOCTYPE html>
<html>
<head><title>Booking Details</title>
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

<?php include_once('includes/header_s.php');?>
<?php // include_once('includes/sidebar_s.php');?>


</body>
</html>

<html>
<head><title>Booking Details</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<form method="get" action="students.php" enctype="multipart/form-data">

</head>
<body>
<div class="container">
			<br />
			<br />
			<br />
			<!-- <a href="students.php">
                             <center>   <img src="image/bdmntn logo only.png" alt="CoolAdmin"> <center>
                            </a> -->
<br><br><br><br><br>

<table  id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer Name</th>
                <th>Field ID</th>
				<th>Start Date</th>
                <th>End Date</th>
                <th>Start Time</th>
                <th>End Time </th>
                <th>Booking Duration</th>
                <th>Booking Fee</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

		<?php
		//$sql = "SELECT * FROM student WHERE $g_code";
		//$result = mysqli_query($conn, $sql);
		//$num_rows = mysqli_num_rows($result);

				//if($row['owner_id']==$_SESSION['owner_id']){
				echo "<tr>";
                echo "<td>" . $booking_info["booking_id"] . "</td>";
				echo "<td>" . $std["name"] . "</td>";
				echo "<td>" . $booking_info["id"] . "</td>";
                echo "<td>" . $booking_info["start_date"] . "</td>";
                echo "<td>" . $booking_info["end_date"] . "</td>";
                echo "<td>" . $booking_info["start_time"] . "</td>";
                echo "<td>" . $booking_info["end_time"] . "</td>";
                echo "<td>" . $booking_info["booking_duration"] . " Hours </td>";
                echo "<td>RM " . $booking_info["booking_fee"] . "</td>";
                echo "<td>" . $booking_info["booking_payment"] . "</td>";

                echo "<td>" .$action = "";
                if($booking_info["booking_payment"] == 'paid' ){
                    echo "<a class='btn btn-danger' href='bookingsadmin.php' >Back</a></td>";
                    //$action = "disabled";
                }

                if($booking_info["booking_payment"] != 'paid'){
                echo "<a class='btn btn-success' href='walkinpay.php?booking_id=" . $booking_info["booking_id"] . "' >Pay</a>";
                echo "<a class='btn btn-danger' href='bookingsadmin.php' >Back</a></td>";
                }
				echo "</tr>";



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
