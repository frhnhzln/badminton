<?php
include 'dbconn.php';

if(isset($_GET["id"])){
	$g_code = $_GET["id"];
	$sql = "SELECT * FROM owner WHERE id='$g_code'";
	$result_get = mysqli_query($conn, $sql);
	$product_info = mysqli_fetch_assoc($result_get);
	
}else{
	echo "<script>alert('No owner id!');</script>";
}

if(isset($_POST["submit"])){
	$status = $_POST["status"];
	
	
	$sql = "UPDATE owner SET status='$status' WHERE id = '$g_code'";
	
	$result = mysqli_query($conn, $sql);
	
	if(!$result){
			echo "update failed";
	}else{
		echo "<script>alert('status success');</script>";
		echo "<script>window.open('app.php','_self')</script>";
	}
}

?>
<html>
<head><title>Owner Status</title></head>
<body>
<h1 align="center">Owner Status</h1>

<form action="" method="post" enctype="multipart/form-data" >
  
  <p><?php echo $product_info['name']; ?></p>
  <p>
  <?php echo $product_info['address']; ?></p>
  <p>
  <?php echo $product_info['email']; ?></p>
  <p>
  <?php echo $product_info['phone']; ?></p>
  <p>
  <?php echo $product_info['cert']; ?></p>
  <p>
  <input name="status" type="hidden" value="2"/>
  </p>
  <p align="center">
    <input type="submit" name="submit" />
  </p>
  <p align="center"><a  class='btn btn-danger' href='app.php' onclick='return confirm('are you sure?');'>delete</a></p>
</form>
</body>
</html>