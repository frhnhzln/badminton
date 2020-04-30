<?php
session_start();
//include("connection.php");
include ("dbcontroller.php");
$db_handle = new DBController();
if(isset($_SESSION["cart_item"]))
{
    $total_price =  $_SESSION["amount"];
    $customer_id = $_SESSION["customerid"];
    
    $insertOrder = $db_handle->insertQuery("INSERT  INTO orders (customer_id, status, total_price) "
            . "VALUES ('$customer_id', 'unpaid', '$total_price') ");
    if($insertOrder)
    {
        //echo "insert orders success<br/>";
        //$last_id = $conn->insert_id;
        $last_id = $db_handle->getLastID();
                echo "Order ID = ".$last_id;
        $_SESSION["neworderid"] = $last_id;
    }
     foreach ($_SESSION["cart_item"] as $item){
		
         $inserOrderDetailsQuery = "INSERT INTO ordersdetails (order_id, product_id, price, quantity, customer_id) "
                 . "VALUES ('$last_id', '" . $item["code"] . "','" . $item["price"] . "','" . $item["quantity"] ."' ,'$customer_id')";
				//$item["name"]; $item["code"]; ;
				//;
				//$item_total += ($item["price"]*$item["quantity"]);
                                
    $insertOrdersDetails = $db_handle->insertQuery($inserOrderDetailsQuery);
     
		}
    
}

if(isset($_GET['cancel'])){
	echo "order cancelled";
}
if(isset($_GET['failed'])){
	echo "cancel order failed";
}




?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Check Out Order Id:#<?php echo $last_id;?> <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
 //print_r($_SESSION["cart_item"]);
?>
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
 <?php
$_SESSION['business'] = 'sdasd';
$_SESSION['order_id'] = '0123';
$_SESSION['cust_email'] = 'user@mail.com'; 
//$_SESSION['return_url'] = $_SERVER['REQUEST_URI']; ///eclab3/index.php
$_SESSION['amount'] = $item_total;
 ?>   
    <td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?>
	<a class='btn btn-danger' href='cancelorder.php' >Cancel Order</a> 	
	<a class='btn btn-success' href='cimbclicks/login.php' >Pay</a> 
	</td>


</tr>
</tbody>
</table>
  <?php
}
?>
</div>
</BODY>
</HTML>