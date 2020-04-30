<?php
include 'dbconn.php';

if(isset($_GET["id"])){
  $g_code = $_GET["id"];
  $sql = "SELECT * FROM car WHERE id='$g_code'";
  $result_get = mysqli_query($conn, $sql);
  $product_info = mysqli_fetch_assoc($result_get);
  
}else{
  echo "<script>alert('No product code!');</script>";
}

if(isset($_POST["submit"])){
    $name =htmlspecialchars($_POST['name']);
    $name =mysqli_real_escape_string($conn,$name);
    $seat = $_POST['seat'];
    $colour = $_POST['colour'];
    $rate = $_POST['rate'];
    $image = mysqli_real_escape_string($conn,$_FILES["image"]["name"]);
    $year = $_POST['year'];
    $info = $_POST['info'];
  
  $image = $_FILES['image']['name'];
  
  
  $sql = "UPDATE car SET name='$name', seat='$seat', colour='$colour', rate='$rate' , image= '$image', year='$year' , info='$info', WHERE id = '$g_code'";
  
  $result = mysqli_query($conn, $sql);
  
  if(!$result){
      echo "update failed";
  }else{
    echo "<script>alert('update success');</script>";
  }
}

?>
<html>
<head><title>Car</title></head>
<body>
<h1 align="center">Update Product</h1>

<!--<form action="" method="post" enctype="multipart/form-data" >
  <p align="center">Name:
  <input name="p_name" type="text" value="<?php echo $product_infoproduct_info['name']; ?>" />
  </p>
  <p align="center">Code:
  <input name="p_code" type="text" value="<?php echo $product_info['code']; ?>"/>
    </p>
  <p align="center">Price:
  <input name="p_price" type="text" value="<?php echo $product_info['price']; ?>"/>
    </p>
  <p align="center">Image:
  <input name="image" type="file" value="<?php echo $product_info['image']; ?>"/>
    </p>
  <p align="center">Description:
  <input name="text" type="text" value="<?php echo $product_info['text']; ?>"/>
    </p>
  <p align="center">
    <input type="submit" name="submit" />
  </p>
  <p align="center"><a  class='btn btn-danger' href='products.php?delete&id=" . $row["id"] . "' onclick='return confirm('are you sure?');'>delete</a></p>
</form>-->

<form action="" method="post"  enctype="multipart/form-data" >
                           
                            <div class="form-group"  required="required">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" id="name" type="text" class="form-control" name="name" value="<?php echo $product_info['name']; ?>" />
                                </div>
                                
                                <div class="form-group">
                                    <label>Seat</label>
                                    <input class="au-input au-input--full" id="seat" type="text" class="form-control" name="seat" value="<?php echo $product_info['seat']; ?>" />
                                </div>
								<div class="form-group">
                                    <label>Colour</label>
                                    <input class="au-input au-input--full" id="colour" type="text" class="form-control" name="colour" value="<?php echo $product_info['colour']; ?>" />
                                </div>
								
								<div class="form-group">
                                    <label>Rental Rate</label>
                                    <input class="au-input au-input--full" id="rate" type="text" class="form-control" name="rate" value="<?php echo $product_info['rate']; ?>" />
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
                                    <input class="au-input au-input--full" id="year" type="text" class="form-control" name="year" value="<?php echo $product_info['year']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="au-input au-input--full" id="info" type="text" class="form-control" name="info" value="<?php echo $product_info['info']; ?>" />
                                </div>	
								
                                
                               <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" value="update" name="submit" >Submit</button>
							  
                               
                            </form>
</body>
</html>