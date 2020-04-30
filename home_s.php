<?php
include("dbconn.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Staff Home</title>

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
    <div class="page-wrapper">
	
    <div class="topnav">
  <a class="active" href="home_s.php">Home</a>
  <!--<a href="add_car.php">Add Cars</a>-->
  <a href="logout_s.php">Log Out</a>
  <div class="content">
                                    <!--<a class="js-acc-btn" href="cars.php"><?php echo $_SESSION ['name']; ?></a>-->
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

	<!-- HEADER DESKTOP-
              <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="home_o.php">
                            <img src="images/logo.jpg" alt="CAR RENTAL HUB" />
                        </a>
                    </div>
                    <div class="header__tool">
                        <div class="header-button-item has-noti js-item-menu">
                            
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">

                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $staff_email; ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
								
                                    <div class="account-dropdown__footer">
                                        <a href="logout.php">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
									
                                </div>
                            </div></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
         END HEADER DESKTOP -->
        
            
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="M_dashboard.php">
                                <img src="image/logo.jpg" alt="CAR RENTAL HUB">
                            </a>
				<nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                     
					   
					   
                        <li><a href="staff_students.php"><button type="button" class="btn btn-primary btn-lg">List of Students</button></a></li>         
						<li><a href="staff_owners.php"><button type="button" class="btn btn-primary btn-lg">List of Owners</button></a></li>    
                        <li><a href="app.php"><button type="button" class="btn btn-primary btn-lg">Application List</button></a></li>
						<li><a href="staff_cars.php"><button type="button" class="btn btn-primary btn-lg">List of Cars</button></a></li>   
						<li><a href="commision.php"><button type="button" class="btn btn-primary btn-lg">View Commisions Received</button></a></li>
                    </ul>
                </nav>
                        </div>
                    </div>
                </div>
        
		<!--<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							 <p>2019 @ Relex Registration System</p>
						</div>
					</div>
				</div>-->

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