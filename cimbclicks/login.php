<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CimbClicks</title>
</head>

<body>
<img  align="middle" src="gambarclick.png"  alt="Cimb Clicks">
    <!--<?php echo $_SESSION['book_fee'];
    //echo $_SERVER["REQUEST_URI"];
    echo "<br/>";
    // qecho $_SESSION["return_url"];
	$cancel =  $_SESSION["return_url"];
    ?>-->
<br />
<br />
<br />

<div align="center">

<form action="logindb.php" method="post">
<input type="text" name="username" />
<input type="password" name="pass" />
<input type="submit" name="login" value="Log Masuk">
<button onClick="window.open('<?php echo $cancel;?>','_self'); return false;">Batal</button>
</form>

</div>
</body></html>
