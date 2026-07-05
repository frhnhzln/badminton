<?php
include("dbconn.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html>
<head>
<!-- HEADER DESKTOP-->
<header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">

                                    </div>

                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <!-- <span class="date">April 12, 2018 06:50</span> -->
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <!-- <span class="date">April 12, 2018 06:50</span> -->
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <!-- <span class="date">April 12, 2018 06:50</span> -->
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo " ".$_SESSION ['name']."";?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo " ".$_SESSION ['name']."";?></a>
                                                    </h5>
                                                    <span class="email"><?php echo " ".$_SESSION ['email']."";?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="home_o.php">
                                                        <i class="zmdi zmdi-account"></i>Home</a>
                                                </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>


                                            <div class="account-dropdown__footer">
                                                <a href="logout_o.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
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
<div class="page-wrapper">

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="home_o.php">
                    <img src="image/radia.png" width ='60' height = '60' alt="CoolAdmin" />

                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="home_o.php">
                                <i class="fas fa-tachometer-alt"></i>Main Menu</a>

                        </li>
                        <li>
                            <a href="report_o.php">
                                <i class="fas fa-chart-bar"></i>Report</a>
                        </li>
                        <li>
                            <a href="field.php">
                                <i class="fas fa-table"></i>My Field</a>
                        </li>

                        <li  class="active">
                            <a href="add_field.php">
                                <i class="fas fa-table"></i>Add Field</a>
                        </li>

                        <li>
                            <a href="staffbooking.php">
                                <i class="fas fa-calendar-alt"></i>Bookings Received</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="income.php">
                                <i class="fas fa-desktop"></i>My Earnings</a>

                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
</body>



<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Add Field</title>

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

                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post"  enctype="multipart/form-data" >

                                <div class="form-group"  required="required">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" id="name" type="text" name="name" placeholder="Field Name" class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Size</label>
                                    <input class="au-input au-input--full" id="size" type="text" name="size" placeholder="Size" class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Rental Rate</label>
                                    <input class="au-input au-input--full" id="rate" type="double" name="rate" placeholder="Rental Rate per Hour (xx.xx)    " class="form-control" required="required">
                                </div>

								<div class="form-group">
                                    <label>Description</label>
                                    <input class="au-input au-input--full" id="info" type="text" name="info" placeholder="" class="form-control" required="required">
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
        $size = $_POST['size'];
        $rate = $_POST['rate'];
        $info = $_POST['info'];


		//echo $name."fff";
		// image file directory



        $insert_c = "INSERT into field (name, size,rate,info)
        VALUES ('$name', '$size', '$rate','$info')";
        $run_c = mysqli_query($conn, $insert_c);
        echo $insert_c;


		if($run_c)
		{
			echo "<script> alert('Successfully added!')</script>";
			echo "<script>window.open('field.php','_self')</script>";
		}
		else{
			{
			echo "<script> alert('Failed to register!')</script>";

           }
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
