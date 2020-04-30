<?php
include("dbconn.php");
session_start();
?>
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
                                    <input class="au-input au-input--full" id="text" type="text" name="info" placeholder="Car Description" class="form-control" required="required">
                                </div>		
								
								
								
                                
                               <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit" name="submit" >Submit</button>
							  
                               
                            </form>
                            <?php

	if(isset($_POST['submit']))
	{
		
        //$id = $_POST['id'];
		$name =$_POST['name'];
		//$name =mysqli_real_escape_string($conn,$name);
		$seat = $_POST['seat'];
        $colour = $_POST['colour'];
        $rate = $_POST['rate'];
		$image = mysqli_real_escape_string($conn,$_FILES["image"]["name"]);
        $year = $_POST['year'];
        $info = $_POST['info'];
		
		// image file directory
		$target = "image/".basename($image);


		$insert_c = "INSERT INTO car
		(name,seat,colour,rate,image,year,info) VALUES	('$name','$seat','$colour','$rate','$image','$year','$info')";
		$run_c = mysqli_query($conn, $insert_c);
		
		
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		}else{
  		$msg = "Failed to upload image";
		}
		
		
		{
			echo "<script> alert('Successfully added!')</script>";
			echo "<script>window.open('cars.php','_self')</script>";
		}
		{
			{
			echo "<script> alert('Failed to register!')</script>";

           }
    }
	
	}
if(isset($_FILES['image']))
    {
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_ext=strtolower(end(explode('.',$_FILES['p_image']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"images/".$name);
           echo "Success";
        }else{
           print_r($errors);
        }
	}

?>