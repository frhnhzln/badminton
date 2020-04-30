<?php
session_start();
include ("dbcontroller.php");
$db_handle = new DBController();
$orderid = $_SESSION["neworderid"];

if(isset($orderid)){
	
	//cancel orderid
	$result = $db_handle->updateOrdersStatustoCancelled($orderid);
	if($result){
		//cancel success
	header('Location: checkout.php?cancel');
		
	}else{
		header('Location: checkout.php?failed');
	}
	
	
}

