<?php
include 'dbconn.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM tblproduct WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        //delete success
        header("Location: updateProduct.php?delete=success");
    }
}
