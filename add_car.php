<?php
include("dbconn.php");
session_start();
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
  overflow: auto;
  background-color: #0000FF ;
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

<div class="topnav">
  <a class="active" href="cars.php">Car List</a>
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
    <title>Add Car</title>

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
                            <a href="add_car.php">
                                <img src="image/logo.jpg" alt="CRH Logo">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post"  enctype="multipart/form-data" >
							
                                <div class="form-group"  required="required">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" id="name" type="text" name="name" placeholder="Car Name" class="form-control" required="required">
                                </div>
                                
                                <div class="form-group">
                                    <label>Seat</label>
                                    <input class="au-input au-input--full" id="seat" type="text" name="seat" placeholder="Seat Number" class="form-control" required="required">
                                </div>
								<div class="form-group">
                                    <label>Colour</label>
                                    <input class="au-input au-input--full" id="colour" type="text" name="colour" placeholder="Car Colour" class="form-control" required="required">
                                </div>
								
								<div class="form-group">
                                    <label>Rental Rate</label>
                                    <input class="au-input au-input--full" id="rate" type="double" name="rate" placeholder="Rental Rate per Hour (xx.xx)    " class="form-control" required="required">
                                </div>
                                
                                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Car Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="image" name="image" class="form-control-file">
                                                </div>
                                </div>

                                <div class="form-group">
                                    <label>Year</label>
                                    <input class="au-input au-input--full" id="year" type="text" name="year" placeholder="Car Year" class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="au-input au-input--full" id="info" type="text" name="info" placeholder="Car Description" class="form-control" required="required">
                                </div>		
								
								
								
                                
                               <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit" name="submit" >submit</button>
							  
                               
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
<?php

	if(isset($_POST['submit']))
	{
		
        //$id = $_POST['id'];
		$name =$_POST['name'];
		$name =mysqli_real_escape_string($conn,$name);
		$seat = $_POST['seat'];
        $colour = $_POST['colour'];
        $rate = $_POST['rate'];
		$image = mysqli_real_escape_string($conn,$_FILES["image"]["name"]);
        $year = $_POST['year'];
        $info = $_POST['info'];
        $owner_id = $_SESSION['id'];
		//echo $name."fff";
		// image file directory
		$target = "image/cars/".basename($image);


        $insert_c = "INSERT into car (name, owner_id,seat,colour,rate,image,year,info) VALUES ('$name', '$owner_id', '$seat','$colour','$rate','$image','$year','$info')";
        $run_c = mysqli_query($conn, $insert_c);
        echo $insert_c;
		
		
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		}else{
  		$msg = "Failed to upload image";
		}
		
		if($run_c)
		{
			echo "<script> alert('Successfully added!')</script>";
			echo "<script>window.open('cars.php','_self')</script>";
		}
		else{
			{
			echo "<script> alert('Failed to register!')</script>";

           }
    }
	
	}
if(isset($_FILES['image']))
    {
        $errors= array();
        $file_name = $_FILES['image']['name'];
        //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        //if($file_size > 2097152){
         //$errors[]='File size must be exactly 2 MB';
        //}
        
        //if(empty($errors)==true){
          // move_uploaded_file($file_tmp,"images/".$name);
           //echo "Success";
      //}else{
        //   print_r($errors);
        //}
	}

?>