<?php
  // Create database connection
session_start();
 include 'dbconn.php';

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
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

    $sql = "INSERT INTO car (name,seat,colour,rate,image,year,info) VALUES	('$name','$seat','$colour','$rate','$image','$year','$info')";
    // execute query
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
  $result = mysqli_query($conn, "SELECT * FROM car");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>

</style>
</head>
<body>
<div id="content">
  <p>
    <nav class="navbar navbar-default"></nav>
  </p>
  <div class="container-fluid">
    <div class="navbar-header"> <a class="navbar-brand" href="#">EMF</a> </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li><a class="active" href="add_car.php">Add product</a></li>
      <li><a href="products.php">Product list</a></li>
      <li><a href="order.php">Order History</a></li>
      <li><a href="#about">About</a></li>
    </ul>
  </div>
  <p>&nbsp;  </p>
  <p>
    <?php
    while ($row = mysqli_fetch_array($result)) {
    if($row['owner_id'] == $_SESSION['owner_id']){
      echo "<div id='img_div'>";
      echo "<img src='image/".$row['image']."' >";
      echo "<p>".$row['info']."</p>";
      echo "</div>";
      }
  }
  ?>
  </p>
  <p>
    <?php
    echo "Welcome, ".$_SESSION['owner_id']."";
  ?>
  </p>
  <form method="POST" action="add.php" enctype="multipart/form-data">
    <h1 align="center">Add Product    </h1>
    <p>
      <input type="hidden" name="size" value="1000000">
    </p>
    <div>
      <p>Name:
  <input name="p_name" type="text" />
      </p>
      <p>Seat:
  <input name="seat" type="text" />
      </p>
      <p>Colour:
  <input name="colour" type="text" />
      </p>
      <p>Rate:
  <input name="rate" type="text" />
      </p>
      <p>Year:
  <input name="year" type="text" />
      </p>
      <p>Info:
  <input name="info" type="text" />
      </p>
      <p> Image:
        <input type="file" name="image">
      </p>
      
    </div>
    <!--<div>
      <p>Description:</p>
      <p>
  <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="text" 
        placeholder="Say something about this image..."></textarea>
      </p>
      <p>Categories:
  <input name="categories" type="text" />
      </p>-->
      <p>
      <input name="owner_id" type="hidden" value="<?php echo ($_SESSION['owner_id']) ?>"/>
    </p>
    </div>
    <div>
      <button type="submit" name="upload">POST</button>
    <p>&nbsp;</p>
    </div>
  </form>
</div>
</body>
</html>