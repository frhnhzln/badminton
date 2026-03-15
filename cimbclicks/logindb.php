<?php 
session_start();
include("connection.php");
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['pass'];

$run = mysqli_query($con, "SELECT * FROM user WHERE user_username='$username' AND user_pass='$password'");
while($row1=mysqli_fetch_array($run)){
	$user_id = $row1['user_id'];
	$deposit = $row1['user_deposit'];
}
	if(mysqli_num_rows($run)==1){
	$_SESSION['user'] = $user_id;
	$_SESSION['username'] = $username;
	$_SESSION['deposit']= $deposit;
	$_SESSION['booking_id']= $_POST['booking_id'];
	echo "<script>alert('Login Successfull')</script>";
	
	header('Location:web_pay_confirm1.php');
	
	}
	else{
		echo "<script>alert('Invalid Username or Password)</script>";
	
		header('Location:login.php');
	}
}

?>