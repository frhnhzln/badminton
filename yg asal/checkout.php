<?php
include 'dbconn.php';
include('includes/config.php');
session_start();
//$student_id=$_SESSION['student_id'];

if(isset($_SESSION["cart_item"]))
{
    $total_price =  $_SESSION["amount"];
    $student_id = $_SESSION["student_id"];
    
    $insertOrder = $db_handle->insertQuery("INSERT  INTO reservation (student_id, start_date, end_date, start_time, end_time) "
            . "VALUES ('$student_id', '$start_date', '$end_date','$start_time','$end_time') ");
    if($insertOrder)
    {
        //echo "insert orders success<br/>";
        //$last_id = $conn->insert_id;
        $last_id = $db_handle->getLastID();
                echo "Order ID = ".$last_id;
        $_SESSION["neworderid"] = $last_id;
    }
     foreach ($_SESSION["cart_item"] as $item){
		
         $inserOrderDetailsQuery = "INSERT INTO reservation (student_id, car_id, start_date, end_date, start_time, end_time ) "
                 . "VALUES ('$student_id', '" . $item["car_id"] . "','" . $item["start_date"] . "','" . $item["end_date"] ."',  '" . $item["start_time"] . "', '" . $item["end_time"] . "' )";
				//$item["name"]; $item["code"]; ;
				//;
				//$item_total += ($item["price"]*$item["quantity"]);
                                
    $insertOrdersDetails = $db_handle->insertQuery($inserOrderDetailsQuery);
     
		}
    
}

if(isset($_GET['cancel'])){
	echo "order cancelled";
}
if(isset($_GET['failed'])){
	echo "cancel order failed";
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
			
<br><br><br>

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
		<?php
		$sql = "SELECT * FROM reservation";
			//$sql = "SELECT * FROM car V LEFT JOIN reservation E ON V.id = E.book_id
			//WHERE E.start_date < '$start_date' OR E.end_date > '$start_date' AND E.start_time < '$start_time' OR E.end_time > '$end_time'";
		$result = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($result);
		//echo $sql;
		
		if($num_rows > 0){
			
			while($row = mysqli_fetch_assoc($result)){
				//if($row['owner_id']==$_SESSION['owner_id']){
				echo "<tr>";
				echo "<td>" . $row["start_date"] . "</td>";
				echo "<td>" . $row["end_date"] . "</td>";
				echo "<td>" . $row["start_time"] . "</td>";
                                echo "<td>" . $row["end_time"] . "</td>";
                                echo "<td>" . $row["book_fee"] . "</td>";
                                echo "<td>" . $row["book_duration"] . "</td>";
                                
                                }
			}
		
		
		?>
		</tbody>
</table>