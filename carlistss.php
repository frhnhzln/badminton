<?php
include 'dbconn.php';
include('includes/config.php');
include 'dbcontroller.php';
$db_handle = new DBController();
session_start();
$student_id=$_SESSION['student_id'];





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

<br>
<h1 align="center">Please choose the car that you want to book.</h1>

</body>
</html>

<html>
<head><title>Cars</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<form method="get" action="cars.php" enctype="multipart/form-data">

</head>
<body>
<div class="container">
			<br />
			<br />
			


<table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Seat</th>
                <th>Colour</th>
				<th>Rate per Hour</th>
				<th>Year</th>
				<th>Description</th>
				<th>Image</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$sql = "SELECT * FROM car ORDER BY name asc";
		//$sql = "SELECT * FROM car V LEFT JOIN bookings E ON V.id = E.booking_id
		//WHERE '$start_date' <E.start_date OR '$end_date' > E.end_date AND '$start_time' < E.start_time OR '$end_time' > E.end_time ";
		
		//$sql = "SELECT car.name, car.status, bookings.start_date, bookings,end_date 
		//FROM car, bookings
		//WHERE car.id = bookings.car_id
		//ORDER BY car.name ASC";
		//$sql = "SELECT car.name ,car.seat, car. colour, car.year, car.rate, car.image, car.info 
			//FROM car, bookings
			//WHERE car.id= bookings.car_id";	
			
		$result = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($result);
		//echo $sql;
		
		if($num_rows > 0){
			
			while($row = mysqli_fetch_assoc($result)){
				//if($row['owner_id']==$_SESSION['owner_id']){
				echo "<tr>";
				?>
				
				<?php
				echo "<td>" . //$row["id"],
				 $row["name"] . "</td>";
				echo "<td>" . $row["seat"] . "</td>";
				echo "<td>" . $row["colour"] . "</td>";
				echo "<td>" . $row["rate"] . "</td>";
				echo "<td>" . $row["year"] . "</td>";
				echo "<td>" . $row["info"] . "</td>";
				echo "<td>" . "<img src='image/cars/".$row['image']."' width ='300' height = '300'>". "</td>";
				?>
				<td><a class='btn btn-success' href="checkout1.php?id=<?php echo $row['id']; $c_id = $row["id"]; $_SESSION['id'] = $c_id;?>">Continue</a></td>
				<!-- <td><a class='btn btn-success' href='checkout.php?id=" . $row["id"] . "' >Continue</a>"; -->
				<?php echo "</tr>";
			}
			}
			
		
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

