<?php
include 'dbconn.php';
include 'dbcontroller.php';
include('includes/config.php');
session_start();
$db_handle = new DBController();
//$student_id=$_SESSION['student_id'];
//$_SESSION['student_id'];

if(isset($_GET["booking_id"]))
				{
				$id=$_GET["booking_id"];
				$query = "SELECT * FROM bookings WHERE booking_id='$id'";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				}


?>
<?php
 $lastUpdatedId=$_SESSION ["kucing"] ;
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
 <!-- Required meta tags-->
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Payment Method</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
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

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<!--<title>Car Rental Hub</title>-->
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

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.center {
  margin: auto;
  width: 60%;

  padding: 10px;
}
</style>
</head>
<body>

<img src="image/radia.png" alt="CRH" style="style=width:200px;height:200px;">



<h1 align="center">Choose your payment method before proceeding</h1>


<br><br><br><br>


<h1 align="center">Payment Method</h1>

<p align="center">Select your payment method to complete the booking from the list below.</p>
<div align = "center" class="center" >
                                <div align = "center" class="card">
                                    <div align = "center"  class="card-header">
                                        <strong>Payment</strong> Method
                                    </div>

                                    <head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
<script type="text/javascript">
 function idForm(){
   var selectvalue = $('input[name=choice]:checked', '#idForm').val();


if(selectvalue == "Online Banking"){
window.open('cimbclicks/login.php?action=pay&booking_id=<?php echo $lastUpdatedId; ?>','_self');
return true;
}
else if(selectvalue == "cash"){
window.open('confirmbooking.php?booking_id=<?php echo $lastUpdatedId; ?>','_self');
return true;
}else if(selectvalue == 'ps3'){
window.open('http://www.google.com','_self');
return true;
}else if(selectvalue == 'psp'){
window.open('http://www.google.com','_self');
return true;
}
return false;
};


</script>
</head>
<body>
<br /><br />
<form id="idForm"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" onclick="idForm()"  name="choice" value="Online Banking"/>   Online Banking (CIMB CLICKS) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio"  onclick="idForm()" name="choice" value="cash"/>   Cash &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form>
</body>




</body>
</html>
