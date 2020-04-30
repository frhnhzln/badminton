<?php
include 'dbconn.php';

$sql = "SELECT * FROM orders ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - date time: " . $row["datetime"];
        echo "<a href='orderdetails.php?id=".$row["id"]."' >".$row["status"]."</a>"."<br>";
    }
} else {
    echo "0 result";
}

mysqli_close($conn);
?>