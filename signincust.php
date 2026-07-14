<?php
include 'dbconn.php';
session_start();

if(isset($_POST["submit"])){
	//sanitize
	$email = htmlspecialchars($_POST["email"]);
	$pass = $_POST["pass"];


	$sql = "SELECT * FROM customer WHERE email='$email'";

	$result = mysqli_query($conn, $sql);
	$result_num_row = mysqli_num_rows($result);

	if($result_num_row == 1){

		$row = mysqli_fetch_assoc($result);

		$password_hashed = $row["pass"];
        echo $password_hashed;
        echo "   ";
        echo $pass;
        echo " password valid:  ";
		$password_valid2 = password_verify($pass, $password_hashed);
		echo $password_valid2;
		if($password_valid2 == TRUE){
			$_SESSION['student_id'] = $row["student_id"];
			$_SESSION['name'] = $row["name"];
			$_SESSION['email'] = $row["email"];

            echo "<script>window.open('indexx.php','_self')</script>";





			//echo "Hi, " . $_SESSION['name'] ." welcome to my ec lab";
			//echo "Press <a href='home.php'>home</a>";
		}else{
            //wrong password action//boleh display link untuk reset password ect

			echo "wrong pasword";
            echo "reset password?<a href='reset.php'>click here</a>";


		}


	}else{
		echo "user not registered";
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
  background-color: #FF0000;
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
  background-color: #FF0000;
  color: white;
}
</style>
</head>
<body>




	<head>

 <!-- Required meta tags-->
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

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
            <div class="images/icon/platinum.jpg">
                <div class="login-wrap">
                    <div class="login-content">
                        <center><a style="font-size: 30px;">Customer Login</a></center>
                        <div class="login-logo">
                            <a href="home.php">
                                <img src="image/bdmntn logo full.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" id="email" type="text" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" id="pass" type="password" name="pass" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="reset.php">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" value="sign in" type="submit" name="submit">sign in</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="register_c.php">Sign Up Here</a>
                                </p>
                            </div>
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
