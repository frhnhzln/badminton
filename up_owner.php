<?php
include 'dbconn.php';
SESSION_START();

if(isset($_GET["name"])){
	$name = $_GET['name'];
	$sql = "SELECT * FROM owner WHERE name='$name'";
	$result_get = mysqli_query($conn, $sql);
	$owner_info = mysqli_fetch_assoc($result_get);
	
}else{
	echo "<script>alert('No owner id!');</script>";
}

if(isset($_POST["submit"])){
    //$id = $_POST['id'];
    $name =htmlspecialchars($_POST['name']);
    $name =mysqli_real_escape_string($conn,$name);
    $address = $_POST['address'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    $cert = mysqli_real_escape_string($conn,$_FILES["cert"]["name"]);
    
    
    // image file directory
    $target = "image/".basename($cert);
		
	
	$sql = "UPDATE owner SET name='$name', address='$address', email='$email', pass='$pass' , phone= '$phone', cert='$cert'  WHERE id = '$g_code'";
	
    $result = mysqli_query($conn, $sql);
		if (move_uploaded_file($_FILES['cert']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		}else{
  		$msg = "Failed to upload image";
		}
		
	if(!$result){
            echo "update failed";
            echo $sql;
	}else{
        echo "<script>alert('update success');</script>";
        echo $sql;
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

<div class="topnav">
  <a class="active" href="cars.php">Home</a>
  <a href="add_car.php">Add Car</a>
  <a href="up_owner.php">Update Profile</a>
  <a href="logout_o.php">Logout</a>
  
</div>

<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Update Profile</title>

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
                            <a href="add_pr.php">
                                <img src="image/logo.jpg" alt="crh Logo">
                            </a>
                        </div>
                        
                            <form action="" method="post"  enctype="multipart/form-data" >
                           
                            <div class="form-group"  required="required">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" id="name" type="text" class="form-control" name="name" value="<?php echo $owner_info['name']; ?>" />
                                </div>
                                
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" id="address" type="text" class="form-control" name="address" value="<?php echo $owner_info['address']; ?>" />
                                </div>
								<div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" id="email" type="text" class="form-control" name="email" value="<?php echo $owner_info['email']; ?>" />
                                </div>
								
								<div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" id="pass" type="text" class="form-control" name="pass" value="<?php echo $owner_info['pass']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="au-input au-input--full" id="phone" type="text" class="form-control" name="phone" value="<?php echo $owner_info['phone']; ?>" />
                                </div>

                                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Company Certificate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="cert" name="cert" class="form-control-file">
                                                </div>
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
