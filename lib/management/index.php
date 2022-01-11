<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h1 class="text-center p-4 " style="background-color:#B6C867"><i>Dashboard</i></h1>
    <div class="container">
        <h2 class="">Action Center</h2>
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="h4">Kiosk Orders</div>
                <div class="tablerep table-responsive tableshadow" style="max-height:50%;min-width:20%">
                    <table class="table table-hover table-striped">
                        <thead class="table-info sticky-top">
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Items</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody style="max-height:10%;">
                            <?php
$sql = "SELECT order_id,generated_id,cust_name,order_cart,carttotal FROM orders WHERE order_attended=0 ORDER BY order_id ASC";
$result = mysqli_query($db_conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cartitems = json_decode($row['order_cart']);
        ?>
                            <tr>
                                <td>#<?php echo $row['generated_id']; ?>
                                <br><?php echo $row['cust_name']; ?></td>
                                <td class="">
                                    <ol class="list-group list-group-numbered">
                                        <?php
foreach ($cartitems as $item_id) {
            $sql2 = "SELECT item_name,variant from product where item_id=$item_id->itemid";
            $result2 = $db_conn->query($sql2) or die($db_conn->error);
            if ($result2->num_rows == 1) {
                $row2 = $result2->fetch_assoc();
                ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-start hoveritem rounded px-1"
                                            style="font-size:.9rem !important;">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?php echo $row2["item_name"]; ?></div>
                                                <div class=""><span
                                                        class="p-1 text-center bg-info fw-bold rounded-circle"><?php echo $row2['variant']; ?></span>
                                                </div>
                                            </div>
                                            <span
                                                class="badge bg-success rounded-pill"><?php echo $item_id->qty; ?></span>
                                        </li>
                                        <?php
}
        }
        ?>
                                    </ol>
                                </td>
                                <td><i class="fas fa-rupee-sign me-1"> <?php echo $row['carttotal']; ?></i></td>
                                <td class="">
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary"
                                            onclick="vieworder(<?php echo $row['order_id']; ?>)"><i
                                                class="far fa-eye"></i></button>
                                        <!-- <button type="button" class="btn btn-danger"><i
                                                class="far fa-trash-alt"></i></button> -->
                                    </div>
                                </td>
                            </tr>
                            <?php
}
} else {
    ?>
                            <tr>
                                <td colspan="5" class="bg-success text-white">No Action required</td>
                            </tr>
                            <?php
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="h4">Inventory status</div>
                <div class="tablerep table-responsive tableshadow" style="max-height:50%;">
                    <table class="table table-hover table-striped caption-top align-middle text-center">
                        <thead class="table-danger">
                            <tr>
                                <th scope="col">Product ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$sql2 = "SELECT item_id,item_name,variant,picturefilepath FROM product WHERE quantity=0 ORDER BY item_id ASC";
$result2 = mysqli_query($db_conn, $sql2);
if (mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        ?>
                            <tr>
                                <td><?php echo $row2['item_id']; ?></td>
                                <td class="d-flex text-start"><img class="border"
                                        src="<?php echo $row2['picturefilepath']; ?>" width="50" height="50" />
                                    <div class="ms-2"><?php echo $row2['item_name']; ?></div>
                                </td>
                                <td class="fw-bold" style="color:red;">Out-of-Stock</td>
                            </tr>
                            <?php
}
} else {
    ?>
                            <tr>
                                <td colspan="3" class="bg-success text-white">All products in stock</td>
                            </tr>
                            <?php
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="">
        <?php require_once "footer.php";?>
    </div> -->
</body>

</html>