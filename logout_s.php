<?php
include("dbconn.php");
session_start();
session_destroy();

echo "<script>window.open('http://localhost/raffbs1/signinadmin.php','_self')</script>";

?>