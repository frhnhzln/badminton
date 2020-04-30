<?php
include 'dbconn.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql = "SELECT * FROM ordersdetails WHERE order_id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "product id: " . $row["product_id"]. " - price: " . $row["price"]. "- quantity: " . $row["quantity"]. "<br>";
    }
} else {
    echo "0 result";
}

mysqli_close($conn);
?>