<?php
session_start();
include_once './dbconn.php';
include_once 'dbcontroller.php'; //("dbcontroller.php");
$db_handle = new DBController();

if (isset($_GET["success"])) {
    if ($_GET["success"] === "Tutup" && isset($_GET["order_id"])) {
        echo "Payment Successfull. Thank you.";
        $order_id = $_GET["order_id"];
        $amount = $_SESSION["amount"];
        //update the ordet table
        $updateOrders = $db_handle->updateOrdersStatustoPaid($order_id);
        if ($updateOrders) {
            echo "<br/>update orders ok";
            //insert table payment			
            $insertPayment = $db_handle->insertQuery("INSERT INTO payment (order_id, method, amount) VALUES ('$order_id', 'online', '$amount')");
            if ($insertPayment) {
                echo "insert payment ok";
            }
        }
    }
}


//manage action, add or delete or empty.
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));

                //check if the session cart_item exist or not
                if (!empty($_SESSION["cart_item"])) {
                    //check if the product item already in session cart_item or not
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                        //when the product already exist in the cart_item array	
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            //loop through all the session cart_item to find the same code
                            if ($productByCode[0]["code"] == $k) {
                                //when the code are same / identical
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    //error check if the quantity is empty
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                //add or increment the quantity at the shopping cart match with the quantity defined by user
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        //when the new product are not exist yet in the cart_item array
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>
<HTML>
    <HEAD>
        <TITLE>Simple PHP Shopping Cart</TITLE>
        <?php include 'header.php'; ?>
    </HEAD>
    <BODY>
        <?Php print_r($_SESSION["cart_item"]); ?>
        <div id="shopping-cart">
            <div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
            <?php
            if (isset($_SESSION["cart_item"])) {
                $item_total = 0;
                ?>
                <form action="cimbclicks/login.php" method="post">
                    <table cellpadding="10" cellspacing="1">
                        <tbody>
                            <tr>
                                <th style="text-align:left;"><strong>Name</strong></th>
                                <th style="text-align:left;"><strong>Code</strong></th>
                                <th style="text-align:right;"><strong>Quantity</strong></th>
                                <th style="text-align:right;"><strong>Price</strong></th>
                                <th style="text-align:center;"><strong>Action</strong></th>
                            </tr>	
                            <?php
                            foreach ($_SESSION["cart_item"] as $item) {
                                ?>
                                <tr>
                                    <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
                                    <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
                                    <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                                    <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$" . $item["price"]; ?></td>
                                    <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
                                </tr>
                                <?php
                                $item_total += ($item["price"] * $item["quantity"]);
                            }
                            ?>
                            <tr>
                                <?php
                                $_SESSION['business'] = 'sdasd';
                                $_SESSION['order_id'] = '0123';
                                $_SESSION['cust_email'] = 'user@mail.com';
                                $_SESSION['customerid'] = '12';
                                $_SESSION['return_url'] = $_SERVER['REQUEST_URI']; ///eclab3/index.php
                                $_SESSION['amount'] = $item_total;
                                ?>   
                                <td colspan="5" align=right><strong>Total:</strong> <?php echo "$" . $item_total; ?> <BUTTON type="submit" name="confirm">Submit</BUTTON></td>


                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php
            }
            ?>
        </div>
        
        
        <div>
            <form action="searchproduct.php" method="post">
                <INPUT type="text" name="p_search" />
                <INPUT type="submit" value="search" name="submit_search" />
            </form>
        </div>

        <div id="product-grid">
            <div class="txt-heading">Products</div>
            <?php
                        if (isset($_POST["submit_search"])) {
                            $keyword = $_POST["p_search"];
                            $sql = "SELECT * FROM tblproduct WHERE name LIKE '%$keyword%' OR code LIKE  '%$keyword%' ORDER BY id ASC";
                            //$product_array = $db_handle->runQuery($sql);
                            $product_array = mysqli_query($conn, $sql);
                            echo $sql;
                        }else{
                            $product_array = mysqli_query($conn, "SELECT * FROM tblproduct ORDER BY id ASC");
                        }            
            
            if ($product_array) {
                //foreach ($product_array as $key => $value) {
                while ($row = mysqli_fetch_assoc($product_array)) {
                    ?>
                    <div class="product-item">
                        <form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
                            <div class="product-image"><img src="<?php echo $row["image"]; ?>"></div>
                            <div><strong><?php echo $row["name"]; ?></strong></div>
                            <div class="product-price"><?php echo "$" . $row["price"]; ?></div>
                            <div><a href="sellercatalogue.php?id=<?php echo $row["sellerid"]; ?>" ><?php echo $row["sellerid"]; ?></a></div>
                            <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
                        </form>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </BODY>
</HTML>