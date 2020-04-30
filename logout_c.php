<?php
include("dbconn.php");
session_start();
session_destroy();

echo "<script>window.open('http://localhost/crh/home.php','_self')</script>";

?>