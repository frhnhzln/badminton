<?php
include 'dbconn.php';

SESSION_START();
if(isset($_GET["delete"])){
	$student_id= $_GET["student_id"];

	$sql = "DELETE FROM customer WHERE student_id = '$student_id'";
	$result = mysqli_query($conn, $sql);
	if($result){

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




</body>
</html>

<html>
<head><title>Customer Details</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<form method="get" action="students.php" enctype="multipart/form-data">
<?php include_once('includes/header_s.php');?>
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

<table id="example" class="table table-striped table-bordered">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<h2>Customer</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search customer.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:30%;">Name</th>
    <th style="width:40%;">Customer ID</th>
    <th style="width:40%;">Action</th>
  </tr>
  <?php
	$sql = "SELECT * FROM customer";
  $result = mysqli_query($conn, $sql);
  $num_rows = mysqli_num_rows($result);



		if($num_rows > 0){

			if($num_rows > 0){

        while($row = mysqli_fetch_assoc($result)){
          //if($row['owner_id']==$_SESSION['owner_id']){
          echo "<tr>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["student_id"] . "</td>";
          //echo "<td>" . $row["address"] . "</td>";
          //echo "<td>" . $row["phone"] . "</td>";
          //echo "<td>" . $row["driving license"] . "</td>";
          //echo "<td>" . $row["info"] . "</td>";
          //echo "<td>" . "<img src='image/".$row['license']."'>". "</td>";
          echo "<td><a class='btn btn-success' href='custdetails.php?student_id=" . $row["student_id"] . "' >view details</a>";
          echo "<a  class='btn btn-danger' href='custa.php?delete&student_id=" . $row["student_id"] . "' onclick='return confirm('are you sure?');'>delete</a></td>";
          echo "</tr>";
			}
			}
    }





		?>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>
</html>



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
