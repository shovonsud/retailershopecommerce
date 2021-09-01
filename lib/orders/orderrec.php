<?php
require_once "management_panel.php";
require_once "../orders/cartsystem.php";
?>
<!DOCTYPE html>

<head>
    <title>Order Records</title>
</head>

<body>
    <h1 class="text-center p-4 mb-2" style="background-color:#B6C867"><i>Order Records</i></h1>
    <div class="container-fluid">
        <div class="text-end mb-1">
            <a class="rounded-pill btn btn-success mb-1" target="_blank" href="../orders/printrec.php">Print</a>
        </div>
        <div class="px-md-5">
            <div class="table-responsive tablerep">
                <table class="table table-striped table-bordered border-dark align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Address</th>
                            <th scope="col">Customer Phone</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total (<i class="fas fa-rupee-sign"></i>)</th>
                            <th scope="col">TimeStamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$sql = "SELECT a.*,b.item_name FROM orders a,product b WHERE a.order_id=b.item_id ORDER BY a.order_id ASC";
$result = $db_conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cartitems = json_decode($row['order_cart']);
        ?>
                        <tr>
                            <td><?php echo $row["order_id"]; ?></td>
                            <td><?php echo $row["cust_name"]; ?></td>
                            <td><?php echo $row["cust_addr"]; ?></td>
                            <td><?php echo $row["cust_phn"]; ?></td>

                            <td class="">
                                <?php
foreach ($cartitems as $item_id) {
            $sql2 = "SELECT item_name,variant from product where item_id=$item_id->itemid";
            $result2 = $db_conn->query($sql2) or die($db_conn->error);
            if ($result2->num_rows == 1) {
                $row2 = $result2->fetch_assoc();
                ?>
                                <div class=""><?php echo $row2["item_name"] . "(" . $row2['variant'] . ")"; ?></div>
                                <?php
}
        }
        ?>
                            </td>
                            <td class="">
                                <?php
foreach ($cartitems as $item_id) {
            //$sql2 = "SELECT item_name,variant from product where item_id=$item_id->itemid";
            //$result2 = $db_conn->query($sql2) or die($db_conn->error);
            //if ($result->num_rows == 1) {
            //$row2 = $result2->fetch_assoc();
            ?>
                                <div class=""><?php echo $item_id->qty; ?></div>
                                <?php
}
        ?>
                            </td>
                            <td class="text-end"><?php
echo $row['carttotal']; ?></td>
                            <td><?php echo $row["timestamp"]; ?></td>
                        </tr>
                        <?php
}
} else {echo "0 results";}
$db_conn->close();
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
require_once "footer.php";?>
    </div>

</body>


</html>