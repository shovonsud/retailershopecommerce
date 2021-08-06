<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Order Records</title>
</head>

<body>
    <h1 class="text-center p-4 mb-2" style="background-color:#B6C867"><i>Order Records</i></h1>
    <div class="container-fluid">
        <div class="text-end">
            <a class="rounded-pill btn btn-success mb-1" target="_blank"
                href="../orders/printrec.php">Print</a>
        </div>
        <div class="table-responsive  px-md-5">
            <div class="overflow-auto" style="overflow:scroll;height: 480px;">
            <table class="rounded border border-dark table table-bordered table-striped caption-top align-middle">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Customer Phone</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Total (<i class="fas fa-rupee-sign"></i>)</th>
                        <th>TimeStamp</th>
                    </tr>
                </thead>
                <tbody class="overflow-auto" style="overflow:scroll;height: 480px;">
                    <?php
$sql = "SELECT a.*,b.item_name FROM orders a,product b WHERE a.cust_item_id=b.item_id ORDER BY a.order_id ASC";
$result = $db_conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["order_id"] . "</td><td>" . $row["cust_name"] . "</td><td>" . $row["cust_addr"] . "</td><td>" . $row["cust_phn"] . "</td><td>" . $row["item_name"] . "</td><td class='text-center'>" . $row['cust_quant'] . "</td><td class='text-end'>" . $row['order_total'] . "</td><td>" . $row["timestamp"] . "</td></tr>";
    }
} else {echo "0 results";}
$db_conn->close();
?>
                </tbody>
            </table>
</div>
        </div>
        <?php
require_once "footer.php";?>
    </div>

</body>


</html>