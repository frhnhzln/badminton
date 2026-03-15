<?php
include 'dbconn.php';
session_start();
if(isset($_GET["id"])){
	$g_code = $_GET["id"];
	$sql = "SELECT * FROM staff WHERE id='$g_code'";
	$result_get = mysqli_query($conn, $sql);
	$owner_info = mysqli_fetch_assoc($result_get);

}else{
	echo "<script>alert('No owner id!');</script>";
}
$ownerid = $_GET["id"];
$sql = "SELECT phone FROM staff WHERE id = '$ownerid'";
$result = mysqli_query($conn, $sql);
$ownerphone = mysqli_fetch_assoc($result);
$text_w = "Congratulations! You are now a verified owner! You are now eligible to provide car rental service for UiTM Kuala Terengganu student. Feel free to contact us if you have any questions. Thank you.";
if(isset($_POST["submit"])){
	$status = $_POST["status"];


	$sql = "UPDATE staff SET status='$status' WHERE id = '$g_code'";

	$result = mysqli_query($conn, $sql);

	if(!$result){
			echo "update failed";
	}else{
		echo "<script>alert('Verification successful');</script>";
		echo "<script>window.open  ('https://api.whatsapp.com/send?phone=".$owner_info["phone"]."&text=".$text_w."&source=&data=','_blank' ) </script> ";
		echo "<script>window.open('app.php','_self')</script>";
	}
}
//https://api.whatsapp.com/send?phone=".$g_cNo."&text=".$text_w."&source=&data='>Notify Payment Reminder</a></td>";
?>
<html>
<head><title>Staff Status</title></head>
<body><br><br><br><br>
<h1 align="center">Staff Status</h1>
<?php include_once('includes/header_s.php');?>

</body>
<table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
			  	      <th>Phone</th>


            </tr>
        </thead>
        <tbody>

		<?php
		//$sql = "SELECT * FROM student WHERE $g_code";
		//$result = mysqli_query($conn, $sql);
		//$num_rows = mysqli_num_rows($result);

				//if($row['owner_id']==$_SESSION['owner_id']){
				echo "<tr>";
				echo "<td>" . $owner_info["name"] . "</td>";
        echo "<td>" . $owner_info["address"] . "</td>";
        echo "<td>" . $owner_info["email"] . "</td>";
				echo "<td>" . $owner_info["phone"] . "</td>";
				//echo "<td>" . $student_info["driving license"] . "</td>";
				//echo "<td>" . $student_info["info"] . "</td>";

				echo "</tr>";



		?>

</table>
</html>


    <form action="" method="post" enctype="multipart/form-data" >


  <p>
  <input name="status" type="hidden" value="verified"/>
  </p>
  <p align="center">
    <input class='btn btn-success mb-3' type="submit" name="submit" />
  </p>
  <p align="center"><a  class='btn btn-danger' href='app.php' onclick='return confirm('are you sure?');'>back</a></p>
</form>
