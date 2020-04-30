<?php
include 'dbconn.php';

SESSION_START();
if(isset($_GET["delete"])){
	$car_id= $_GET["id"];
	
	$sql = "DELETE FROM car WHERE id = '$car_id'";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo "<script>alert('Delete success');</script>";
	}else{
	echo "<script>alert('Delete failed');</script>";
	}
}

//echo "Welcome, ".$_SESSION ['name']."";

?>
<!DOCTYPE html>
<html>
<head>
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
  <a class="active" href="cars.php">Car List</a>
  <a href="add_car.php">Add Cars</a>
  <a href="up_owner.php">Update Profile</a>
  <a href="logout_o.php">Log Out</a>
  <div class="content">
                                    <a class="js-acc-btn" href="cars.php"><?php echo $_SESSION ['name']; ?></a>
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
			<br />
			<a href="cars.php">
                             <center>   <img src="image/logo.jpg" alt="CoolAdmin"> <center>
                            </a>
<br><br><br>

<table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Seat</th>
                <th>Colour</th>
				<th>Rate</th>
				<th>Year</th>
				<th>Description</th>
				<th>Image</th>
        <th>Status (1 = Available, 2 = Booked)</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$sql = "SELECT * FROM car";
		$result = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($result);

		
		if($num_rows > 0){
			
			while($row = mysqli_fetch_assoc($result)){
				if($row['owner_id']==$_SESSION['id']){
				echo "<tr>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td>" . $row["seat"] . "</td>";
				echo "<td>" . $row["colour"] . "</td>";
				echo "<td>" . $row["rate"] . "</td>";
				echo "<td>" . $row["year"] . "</td>";
				echo "<td>" . $row["info"] . "</td>";
        echo "<td>" . "<img src='image/cars/".$row['image']."' width ='300' height = '300'>". "</td>";
        echo "<td>" . $row["status"] . "</td>";
				echo "<td><a class='btn btn-success' href='up_car.php?id=" . $row["id"] . "' >update</a>";
				echo "<a  class='btn btn-danger' href='cars.php?delete&id=" . $row["id"] . "' onclick='return confirm('are you sure?');'>delete</a></td>";
				echo "</tr>";
			}
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