<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    require_once "management_panel.php";
} else {
    require_once "db_connect.php";
}
$sql='';
if(isset($_GET['orderid'])){
$orderid = $_GET['orderid'];
$sql = "SELECT * FROM orders WHERE order_id=$orderid";
}
elseif (isset($_GET['gen_id'])) {
    $genid=$_GET['gen_id'];
    $sql="SELECT * FROM orders WHERE generated_id='$genid'";
}
$result = mysqli_query($db_conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "No such Order";
    exit();
}

$row = mysqli_fetch_assoc($result);
$cartitems = json_decode($row['order_cart']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Confirm Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        function printPage() {
            var printContents = document.getElementById("printarea").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</head>

<body>
    <h1 class="p-4" style="background-color:#B6C867"><i class="fas fa-clipboard-list"></i> Order
        #<?php echo $row['generated_id']; ?></i></h1>
    <div id="printarea">
        <div class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10 rounded"
                    style="background-color:#DBE6FD">
                    <form class="p-1 p-sm-4 mb-1" method="POST" action="confirm_order.php">
                        <input class="d-none" name="unattendedorderid" value="<?php echo $orderid; ?>" readonly
                            required>
                        <div class="row border-bottom border-dark border-2">
                            <div class="d-flex justify-content-between">
                                <h4 class="">LIFE <i class="fab fa-internet-explorer fa-xs"></i> Shop</h4>
                                <div>
                                    <div class="fw-bold">Date & Time</div><?php echo $row['timestamp']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-between">
                                <div class="p-1 col-8 col-sm-4 mb-3">
                                    <div class="fw-bold h5">Order ID <div class="badge bg-info text-dark fs-4">#
                                            <?php echo $row['generated_id']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="p-1 col-8 col-sm-4 mb-3">
                                    <label class="fw-bold">Customer Name</label>
                                    <input class="form-control border border-dark rounded fw-bold vieworderfield"
                                        type="text" name="customername" value="<?php echo $row['cust_name']; ?>"
                                        readonly>
                                </div>
                            </div>
                            <div class="row align-items-center  d-flex justify-content-between">
                                <div class="px-1 col-6 mb-3">
                                    <label class="fw-bold">Customer Address</label>
                                    <textarea class="form-control border border-dark rounded vieworderfield fw-bold"
                                        rows="3" name="customeraddr" placeholder="<?php echo $row['cust_addr']; ?>"
                                        readonly></textarea>
                                </div>
                                <div class="px-1 col-6 col-sm-5 col-md-5 col-lg-4 mb-3">
                                    <label class="fw-bold">Customer Phone</label>
                                    <input class="form-control border border-dark rounded vieworderfield fw-bold"
                                        type="text" name="customerphn" value="<?php echo $row['cust_phn']; ?>" readonly
                                        minlength="10" maxlength="10" size="10" pattern="\d{10}">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="carttable"
                                class="fw-bold table caption-top table-striped text-center table-secondary table-hover align-middle">
                                <caption>Order cart</caption>
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Product Name</th>
                                        <th>Variant</th>
                                        <th>Rate</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
foreach ($cartitems as $item_id) {
    $sql2 = "SELECT item_name,variant,unit_price from product where item_id=$item_id->itemid";
    $result2 = $db_conn->query($sql2) or die($db_conn->error);
    if ($result2->num_rows == 1) {
        $row2 = $result2->fetch_assoc();
        ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-start"><?php echo $row2["item_name"]; ?></td>
                                        <td class=""><?php echo $row2["variant"]; ?></td>
                                        <td class=""><i class="fas fa-rupee-sign me-1"></i>
                                            <?php echo $row2["unit_price"]; ?>
                                        </td>
                                        <td class=""><?php echo $item_id->qty; ?></td>
                                        <td class=""><i class="fas fa-rupee-sign me-1"></i>
                                            <?php echo number_format($row2["unit_price"] * $item_id->qty,2); ?>
                                        </td>
                                    </tr>
                                    <?php
}
}
?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <div>
                                <label for="carttotal" class="fw-bold">
                                    <h2>Total</h2>
                                </label>
                                <div>
                                    <div class="input-group border border-dark rounded">
                                        <span class="input-group-text bg-info"><i class="fas fa-rupee-sign"></i></span>
                                        <input class="fs-4 form-control fw-bold bg-info text-end" id="" type="number"
                                            name="carttotal" readonly required placeholder="Cart Total"
                                            value="<?php echo number_format($row['carttotal'],2); ?>" />
                                    </div>
                                </div>

                                <div class="mt-2">

                                    <div class="d-flex flex-row-reverse gap-3">
                                        <?php
if ($row['order_attended'] == 0 && isset($_SESSION['logged_in'])) {
    ?>
                                        <button class="btn btn-success" type="submit" name="cartsubmit">Confirm
                                            Order</button>
                                        <a href="../management/" class="btn btn-warning"><i
                                                class="far fa-hand-point-left"></i>Go back
                                        </a>
                                        <?php
} else {
    ?>
                                        <button class="btn btn-success" name="cartsubmit" onclick="printPage()">Print <i
                                                class="fas fa-print"></i></button>
                                        <?php
}
?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </section>
        </div>
    </div>

</body>

</html>