<?php
include 'dbconn.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM tblproduct WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST["submit_updateproduct"])) {
    
    $productid = $_POST["p_id"];
    $productname = $_POST["p_name"];
    $productcode = $_POST["p_code"];
    $productquantity = $_POST["p_quantity"];
    $productprice = $_POST["p_price"];
    //$productimage = $target_file;
    $sql = "UPDATE tblproduct SET name='$productname', code='$productcode', quantity='$productquantity', price='$productprice' WHERE id='$productid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("update success!");</script>';
        header("Refresh:0");
    } else {
        echo '<script>alert("something wrong - Update failed");</script>';
    }
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Details Product</title>
<?php include 'header.php'; ?>
    </head>
    <body>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="addProduct.php">Add product</a></li>
            <li><a class="active" href="updateProduct.php">Update product</a></li>
            <li><a href="order.php">Order History</a></li>
            <li><a href="#about">About</a></li>
        </ul>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="p_id" value="<?php echo $_GET["id"];?>"/>
            <label>Product Name</label>
            <input type="text" name="p_name" value="<?php echo $row["name"]; ?>"/>
            <br>
            <label>Product Code</label>
            <input type="text" name="p_code" value="<?php echo $row["code"]; ?>"/>
            <br>
            <label>Product Price</label>
            <input type="text" name="p_price" value="<?php echo $row["price"]; ?>"/>
            <br>
            <label>Product Quantity</label>
            <input type="number" name="p_quantity" value="<?php echo $row["quantity"]; ?>"/>
            <br>
            <label>Product Image</label>
            <img src="<?php echo $row["image"]; ?>" alt="image product" />
            <input type="file" name="p_image"/>

            <br>
            <input type="submit" value="Update" name="submit_updateproduct" />
        </form>

<?php
// put your code here
?>
    </body>
</html>
