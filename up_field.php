<?php
include 'dbconn.php';
if(isset($_GET["id"])){
	$g_code = $_GET["id"];
	$sql = "SELECT * FROM field WHERE id='$g_code'";
	$result_get = mysqli_query($conn, $sql);
	$car_info = mysqli_fetch_assoc($result_get);

}else{
	echo "<script>alert('No product code!');</script>";
}

if(isset($_POST["submit"])){
    //$id = $_POST['id'];
    $name =htmlspecialchars($_POST['name']);
    $name =mysqli_real_escape_string($conn,$name);
    $size = $_POST['size'];


    $rate = $_POST['rate'];

    $info = $_POST['info'];

    // image file directory



	$sql = "UPDATE field SET name='$name', size='$size', rate='$rate' , info='$info' WHERE id = '$g_code'";

    $result = mysqli_query($conn, $sql);


	if(!$result){
            echo "update failed";
            echo $sql;
	}else{
        echo "<script>alert('Update Successful!');</script>";
        echo "<script>window.open('field.php','_self')</script>";;
	}
}
?>


<!DOCTYPE html>
<html lang="en">
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
  background-color: #0000FF
  color: white;
}
</style>
</head>
<body>



<head>
<?php include_once('includes/header_o.php');?>
<?php include_once('includes/sidebar_o.php');?>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Update Car</title>

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

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>



<body class="animsition">


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
                                    <input class="au-input au-input--full" id="name" type="text" class="form-control" name="name" value="<?php echo $car_info['name']; ?>" />
                                </div>

                                <div class="form-group"  required="required">
                                    <label>Size</label>
                                    <input class="au-input au-input--full" id="size" type="text" class="form-control" name="size" value="<?php echo $car_info['size']; ?>" />
                                </div>


								<div class="form-group">
                                    <label>Rental Rate</label>
                                    <input class="au-input au-input--full" id="rate" type="text" class="form-control" name="rate" value="<?php echo $car_info['rate']; ?>" />
                                </div>


                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="au-input au-input--full" id="info" type="text" class="form-control" name="info" value="<?php echo $car_info['info']; ?>" />
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
