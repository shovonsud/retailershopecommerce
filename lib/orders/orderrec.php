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
            <a class="rounded-pill btn btn-success mb-1" target="_blank" href="../orders/printrec.php">Print</a>
        </div>
        <div class="px-md-5">
            <div class="table-responsive tablerep">
                <table class="table table-striped table-bordered caption-top align-middle">
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
    </div>
    <?php
require_once "footer.php";?>
    </div>

</body>


</html>