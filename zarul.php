UiTM Zarul, [23.02.20 01:26]
<?php
include 'dbconn.php';
session_start();

if(isset($_POST["submit"])){
  //sanitize
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);
   
  $sql = "SELECT * FROM students WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  $result_num_row = mysqli_num_rows($result);
  
  if($result_num_row == 1){
    
    $row = mysqli_fetch_assoc($result);
    
    $password_hashed = $row["password"];
    
    $password_valid = password_verify($password, $password_hashed);
    
    if($password_valid){
      $_SESSION['name'] = $row["name"];
      $_SESSION['email'] = $row["email"];
    
      
      {
        
        echo "jadi syal. power do. lusa grad";
      }
      
    }else{
      //wrong password action//boleh display link untuk reset password ect
      echo "wrong pasword";
      echo "reset password?<a href='reset_password.php'>click here</a>";
    }
    
    
  }else{
    echo "user not registered";
  }
}

?>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>EMF Customer Login</title>

     <!-- Google font -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

     <!-- Bootstrap -->
     <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

     <!-- Slick -->
     <link type="text/css" rel="stylesheet" href="css/slick.css"/>
     <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

     <!-- nouislider -->
     <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

     <!-- Font Awesome Icon -->
     <link rel="stylesheet" href="css/font-awesome.min.css">

     <!-- Custom stlylesheet -->
     <link type="text/css" rel="stylesheet" href="css/style.css"/>
<title>SignIn Staff EMF</title>
</head>

<body>
<div class="section">
      <!-- container -->
      <div class="container">
        
        <form method="post" action="" >
          <p>Email:
            <input type="text" name="email" class="form-control" placeholder="email" required=""/>
            </p>
         
          <p>Password:
            <input type="password" name="password" class="form-control" placeholder="password" required=""/>
            
            <br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>

              </p>

        </form>
        <p>Does not have account,<a href="signupstaff.php"> Sign Up </a>now</p>
        
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

</body>
</html>