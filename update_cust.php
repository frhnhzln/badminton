<?php
include 'dbconn.php';
if(isset($_GET["student_id"])){
	$g_code = $_GET["student_id"];
	$sql = "SELECT * FROM customer WHERE student_id='$g_code'";
	$result_get = mysqli_query($conn, $sql);
	$cust_info = mysqli_fetch_assoc($result_get);

}else{
	echo "<script>alert('No detail of customer!');</script>";
}

if(isset($_POST["submit"])){
    //$id = $_POST['id'];
    $name =htmlspecialchars($_POST['name']);
    $name =mysqli_real_escape_string($conn,$name);
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // image file directory



	$sql = "UPDATE customer SET name='$name', email='$email', address='$address' , phone='$phone' WHERE student_id = '$g_code'";

    $result = mysqli_query($conn, $sql);


	if(!$result){
            echo "update failed";
            echo $sql;
	}else{
        echo "<script>alert('Update Successful');</script>";
        echo "<script>window.open('profile.php','_self')</script>";;
	}
}
?>


<!DOCTYPE html>
<html lang="en">
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
  background-color: #0000FF
  color: white;
}
</style>


    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Update Customer</title>


    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
		<!--Bootstrap -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>"rel="stylesheet">
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
<?php include('includes/header_index.php');?>


    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">

                        </div>

                            <form action="" method="post"  enctype="multipart/form-data" >

                            <div class="form-group"  required="required">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" id="name" type="text" class="form-control" name="name" value="<?php echo $cust_info['name']; ?>" />
                                </div>

                                <div class="form-group"  required="required">
                                    <label>email</label>
                                    <input class="au-input au-input--full" id="email" type="text" class="form-control" name="email" value="<?php echo $cust_info['email']; ?>" />
                                </div>


								<div class="form-group">
                                    <label>address</label>
                                    <input class="au-input au-input--full" id="address" type="text" class="form-control" name="address" value="<?php echo $cust_info['address']; ?>" />
                                </div>


                                <div class="form-group">
                                    <label>phone number</label>
                                    <input class="au-input au-input--full" id="phone" type="text" class="form-control" name="phone" value="<?php echo $cust_info['phone']; ?>" />
                                </div>


                               <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit" value="update" name="submit" >Submit</button>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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
<!-- end document-->
