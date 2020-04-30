<?php
include './dbconn.php';

$sql = "SELECT tblproduct.name, tblproduct.price, tblproduct.code, tblproduct.sellerid,
ordersdetails.order_id, ordersdetails.quantity, ordersdetails.id as detailsid,
ordersdetails.status, orders.datetime 
FROM tblproduct 
INNER JOIN ordersdetails 
ON tblproduct.code=ordersdetails.product_id
INNER JOIN orders
ON ordersdetails.order_id=orders.id 
WHERE tblproduct.sellerid='12'
ORDER BY orders.datetime DESC
";

$result = mysqli_query($conn, $sql);


if (isset($_POST["submit"])) {
    
    $detailsid = $_POST["order_detailsid"];
    $status = $_POST["order_status"];
    
    $sql = "UPDATE ordersdetails SET status='$status' WHERE id='$detailsid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "update successfull";
        header("Location: seller-updateorder.php?ok");
    }
}


?>
<html>
    <head><title>Seller - Update Order</title></head>
    <body>
        <h1>Seller - view order</h1>
        <?php 
        if(isset($_GET["ok"])){
            echo 'update succeess!';
        }
        ?>

        <table>
            <tr>
                <th>order id</th>
                <th>product name</th>
                <th>quantity</th>
                <th>status</th>
                <th>Update</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <tr>
                <form action="" method="POST">
                    <td><?php echo $row["order_id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td>
                        <input type="hidden" name="order_detailsid" value="<?php echo $row["detailsid"];?>" />
                        <select name="order_status">
                            <option value="processed" <?php if($row["status"] == 'processed'){ 
                                echo 'selected';}?> >
                                Processed</option>
                            <option value="shipped" <?php if($row["status"] == 'shipped'){ 
                                echo 'selected';}?> >Shipped</option>
                            <option value="completed" <?php if($row["status"] == 'completed'){ 
                                echo 'selected';}?> >Completed</option>
                        </select>
                        <input type="submit" name="submit" value="submit"/>
                    </td>
                </form>
            </tr>

            <?php
        }
        ?>
    </table>

</body>
</html>


