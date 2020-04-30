<?php
include './dbconn.php';

$sql = "SELECT tblproduct.name, tblproduct.price, tblproduct.code, tblproduct.sellerid,
ordersdetails.order_id, ordersdetails.quantity,
orders.status, orders.datetime 
FROM tblproduct 
INNER JOIN ordersdetails 
ON tblproduct.code=ordersdetails.product_id
INNER JOIN orders
ON ordersdetails.order_id=orders.id 
WHERE tblproduct.sellerid='12'
ORDER BY orders.datetime DESC
";

$result = mysqli_query($conn, $sql);
?>
<html>
    <head><title>Seller - view Order</title></head>
    <body>
        <h1>Seller - view order</h1>
        <table>
            <tr>
            <th>order id</th>
            <th>product name</th>
            <th>quantity</th>
            <th>status</th>
            <th>Action</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <tr>
                <td><?php echo $row["order_id"];?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["quantity"];?></td>
                <td><?php echo $row["status"];?></td>
                <td><a href="" >update</a></td>
            </tr>
            <?php   
            }
            ?>
        </table>

    </body>
</html>


