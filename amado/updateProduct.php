<?php
if (isset($_GET["delete"])) {
    echo '<script>alert("delete success!");</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update product Details</title>

        <?php include 'header.php'; ?>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="addProduct.php">Add product</a></li>
            <li><a class="active" href="updateProduct.php">Update product</a></li>
            <li><a href="order.php">Order History</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <h1>Update Product</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'dbconn.php';
                $sql = "SELECT * FROM tblproduct ORDER BY id";
                $result = mysqli_query($conn, $sql);
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $no++ . '</td>';
                    echo '<td>' . $row["name"] . '</td>';
                    echo '<td>' . $row["code"] . '</td>';
                    echo '<td>' . $row["quantity"] . '</td>';
                    echo '<td>';
                    echo '<a class="w3-button w3-yellow" href="updatedetails.php?id=' . $row["id"] . '" >update</a>';
                    echo '<a onclick="return confirm_delete()" class="w3-button w3-red" href="deletedetails.php?id=' . $row["id"] . '" >delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

        <script>
            function confirm_delete(){
                return confirm("are you sure?");
            }
        </script>
    </body>
</html>
