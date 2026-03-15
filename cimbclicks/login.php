<?php
session_start();
include "connection.php";
include "dbconn.php";
if(isset($_SESSION["payment"]))
{
    $payment =  $_SESSION["payment"];
    $booking_id = $_SESSION["booking"];
    $student_id = $_SESSION["student_id"];
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
                                if($insertOrdersDetails)
    {

        //$last_id = $db_handle->getLastID();
         //       echo "<BR/>Order Details ID = ".$last_id;
    }
		}

}

$booking_id=-1;
if(isset($_GET["action"])=='submit' && isset($_GET["booking_id"]))
{
    $booking_id=$_GET["booking_id"];
    $_SESSION["buaya"] = $booking_id;
}
else{
    echo "Invalid Request"; die;
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CimbClicks</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
<style>
  body{
    background: #e5e5e5;
  }
  .container{
    width: 50%;
    margin: 0 auto;
    padding: 0.3rem 1rem;
  }
  .form{
    width: 50%;
    background: #f4f4f4;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 2rem 1rem 0;
    margin: 1rem;
    font-family: sans-serif;
    overflow: hidden;
  }

  .form > *{
    margin-bottom: 1rem;
  }
  .form-text{
    display: block;
    align-self: start;
    font-weight: light;
    color: #b7b7a4;
    margin-bottom: 0.2rem;
  }
  .form-control{
    display: block;
    padding: 0.3rem;
    border: #333 0.5px solid;
    border-radius: 5px;
    width: 100%;
  }
  .form-control:focus{
    outline: none;
  }
  .btn {
    display: block;
    width: 70%;
    border: none;
    background: #fa2837;
    padding: 0.5rem 0.8rem;
    border-radius: 10px;
    color: #fff;
    transition: all 1s;
    font-weight: bold;
    font-size: 1rem;
  }

  .btn:hover{
    background: rgb(199, 58, 68);
  }
  .text{
    font-family:'Lato',sans-serif;
    font-weight: bold;
  }
</style>
</head>

<body>

    <?php //echo $_SESSION['payment'];
    //echo $_SERVER["REQUEST_URI"];
    echo "<br/>";
    // qecho $_SESSION["return_url"];

    ?>
<br />
<br />
<br />
<p align="center"><img src="gambarclick.png"></p>
<p align="center" class="text">PLEASE NOTE THAT IF YOU CANCEL THE PAYMENT, YOU HAVE TO PAY BY CASH AT THE COUNTER!</p>
<div align="center">
<div class="container">
<form action="logindb.php" method="post" class='form'>
<label for="username" class='form-text'>Username</label>
<input type="text" name="username" id="username" class='form-control'autocomplete='off'/>
<label for="password" class='form-text'>Password</label>
<input type="password" name="pass" id="password" class='form-control'/>
<input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
<!-- <input type="submit" name="login" value="Login" class='btn'> -->
<button type="submit" name='login' class="btn">Login <i class="fas fa-sign-in-alt"></i></button>
<a class="btn" href="../indexx.php">Cancel <i class="fas fa-window-close"></i></a>
<!-- <button onClick="window.open('<?php //echo $cancel;?>','_self'); return false;"class='btn'>Cancel</button> -->
</form>
</div>

</div>
</body></html>
