<?php
include 'dbconn.php';

SESSION_START();
if(isset($_GET["student_id"])){
    $g_code = $_GET["student_id"];
    //$student_id= $_GET["student_id"];

	$sql = "SELECT * FROM customer WHERE student_id = '$g_code'";
    $result_get = mysqli_query($conn, $sql);
    $student_info = mysqli_fetch_assoc($result_get);
	//if($result){
	//	echo "<script>alert('Delete success');</script>";
	//}else{
	//echo "<script>alert('Delete failed');</script>";

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

<?php include_once('includes/header_s.php');?>
<?php // include_once('includes/sidebar_s.php');?>


</body>
</html>

<html>
<head><title>Students</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<form method="get" action="students.php" enctype="multipart/form-data">

</head>
<body>
<div class="container">
			<br />
			<br />
			<br />
			<!-- <a href="home_s.php">
                             <center>   <img src="image/bdmntn logo only.png" alt="CoolAdmin"> <center>
                            </a> -->
<br><br><br><br><br>

<table  id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Customer ID</th>
                <th>Email</th>
                <th>Address</th>
			  	      <th>Phone</th>


            </tr>
        </thead>
        <tbody>

		<?php
		//$sql = "SELECT * FROM student WHERE $g_code";
		//$result = mysqli_query($conn, $sql);
		//$num_rows = mysqli_num_rows($result);

				//if($row['owner_id']==$_SESSION['owner_id']){
				echo "<tr>";
        echo "<td>" . $student_info["name"] . "</td>";
        echo "<td>" . $student_info["student_id"] . "</td>";
				echo "<td>" . $student_info["email"] . "</td>";
				echo "<td>" . $student_info["address"] . "</td>";
				echo "<td>" . $student_info["phone"] . "</td>";
				//echo "<td>" . $student_info["driving license"] . "</td>";
				//echo "<td>" . $student_info["info"] . "</td>";

				//echo "<td><a class='btn btn-success' href='student_details.php?student_id=" . $row["student_id"] . "' >view details</a>";

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
