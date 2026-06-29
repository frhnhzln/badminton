<?php
include("dbconn.php");
session_start();
session_destroy();

echo "<script>window.open('http://localhost/badminton/badminton/signinadmin.php','_self')</script>";

?>