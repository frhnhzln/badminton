<?php
include 'dbconn.php';

$target_dir = "product-images/";
$target_file = $target_dir . basename($_FILES["p_image"]["name"]);
// product-images/camera.jpg
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_GET["sellerid"])){
    $sellerid = $_GET["sellerid"];
}
echo "Seller id : " . $sellerid;
if (isset($_POST["submit_addproduct"])) {
    $check = getimagesize($_FILES["p_image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["p_image"]["name"]) . " has been uploaded.";
            
            $productname = $_POST["p_name"];
            $productcode = $_POST["p_code"];
            $productquantity = $_POST["p_quantity"];
            $productprice = $_POST["p_price"];
            $productimage = $target_file;
            
            $sql = "INSERT INTO tblproduct (name, code, image, price, sellerid, quantity) "
                    . "VALUES ('$productname', '$productcode', '$productimage', '$productprice', '$sellerid' ,'$productquantity')";
            echo $sql;
            $result = mysqli_query($conn, $sql);
            
            if($result){
                echo 'insert database success.';
            }else{
                echo 'failed to insert database';
            }
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} //end of isset - post submit-addproduct
?>


<!DOCTYPE html>
<html>
    <head>
        <title>add product</title>
        <?php include 'header.php';?>
    </head>
    <body>
        
         <ul>
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="addProduct.php">Add product</a></li>
            <li><a href="updateProduct.php">Update product</a></li>
            <li><a href="order.php">Order History</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        
        <h1>Add Product</h1>

        <form action="addProduct.php?sellerid=<?php echo '12'; ?>" method="post" enctype="multipart/form-data">
            <label>Product Name</label>
            <input type="text" name="p_name"/>
            <br>
            <label>Product Code</label>
            <input type="text" name="p_code"/>
            <br>
            <label>Product Price</label>
            <input type="number" name="p_price"/>
            <br>
            <label>Product Quantity</label>
            <input type="number" name="p_quantity"/>
            <br>
            <label>Product Image</label>
            <input type="file" name="p_image"/>
            <input type="file" name="p_image2"/>
            <br>
            <input type="submit" value="Add Product" name="submit_addproduct" />
        </form>

    </body>
</html>

<?php mysqli_close($conn);?>