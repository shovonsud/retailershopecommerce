<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    require_once "management_panel.php";
} else {
    require_once "db_connect.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='../../assets/style/style.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="../../assets/images/icon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../../assets/js/app.js"></script>
</head>

<body>
    <h1 class="p-4" style="background-color:#B6C867"><i class="fas fa-shopping-cart"> Cart Checkout...</i></h1>
    <div class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10 rounded" style="background-color:#DBE6FD">
                <form class="p-1 p-sm-4 mb-1" method="POST" action="neworder.php">
                    <div class="row border-bottom border-dark border-2">
                        <div class="row d-flex justify-content-between">
                            <div class="p-1 col-8 col-sm-4 mb-3">
                                <label class="fw-bold">Customer Name</label>
                                <input class="form-control border border-dark rounded" type="text" name="customername"
                                    autofocus placeholder="Enter Customer Name" required>
                            </div>
                        </div>
                        <div class="row align-items-center  d-flex justify-content-between">
                            <div class="px-1 col-6 mb-3">
                                <label class="fw-bold">Customer Address</label>
                                <textarea class="form-control border border-dark rounded" rows="3" name="customeraddr"
                                    placeholder="Enter Customer Address"></textarea>
                            </div>
                            <div class="px-1 col-6 col-sm-5 col-md-5 col-lg-4 mb-3">
                                <label class="fw-bold">Customer Phone</label>
                                <input class="form-control border border-dark rounded" type="text" name="customerphn"
                                    placeholder="Enter Phone no." required minlength="10" maxlength="10" size="10"
                                    pattern="\d{10}">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="carttable" class="table caption-top table-light rounded-pill p-1 table-hover">
                            <caption>Your cart</cption>
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Product Name</th>
                                    <th>Variant</th>
                                    <th>Rate</th>
                                    <th>Quantity</th>
                                    <th class="table-success">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$carttotal = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $itemid => $value) {
        $sql = "SELECT * from product where item_id=$itemid";
        $result = mysqli_query($db_conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $carttotal += $row['unit_price'] * $_SESSION['cart'][$itemid]['qty']
            ?>
                                <tr>
                                    <td></td>
                                    <td class="d-flex"><img class="border" src="<?php echo $row['picturefilepath']; ?>"
                                            width="50" height="50" />
                                        <div class="ms-2"><?php echo $row['item_name']; ?></div>
                                    </td>
                                    <td><?php echo $row['variant']; ?></td>
                                    <td><i class="fas fa-rupee-sign"></i> <?php echo $row['unit_price']; ?></td>
                                    <td><?php echo $_SESSION['cart'][$itemid]['qty']; ?></td>
                                    <td class="table-success fw-bold"><i class="fas fa-rupee-sign"></i>
                                        <?php echo number_format($row['unit_price'] * $_SESSION['cart'][$itemid]['qty'],2); ?>
                                    </td>
                                </tr>
                                <?php
}
        ?>
                                <?php
}
}
?>
                            </tbody>
                        </table>
                    </div>
                    <div class="position-relative">
                        <div class="float-end">
                            <label for="carttotal" class="fw-bold">
                                <h2>Total</h2>
                            </label>
                            <div class="input-group border border-dark rounded" style="width:200px;">
                                <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                                <input class="form-control fw-bold text-end fs-4" id="carttotal" type="number"
                                    name="carttotal" readonly required placeholder="Cart Total"
                                    value="<?php echo number_format($carttotal,2); ?>" />
                            </div>
                        </div>
                        <br><br><br><br>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="h4">Payment Method</div>
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentmethod" id="cashmethod"
                                    value="Cash" required>
                                <label class="form-check-label fw-bold" for="cashmethod">Cash</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentmethod" id="onlinemethod"
                                    value="Online" required>
                                <label class="form-check-label fw-bold" for="onlinemethod">Online(Wallet/UPI/Debit
                                    Card)</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse gap-3">
                        <button class="btn btn-success" type="submit" name="cartsubmit">Proceed</button>
                        <a href="../orders/order.php" class="btn btn-warning"><i class="far fa-hand-point-left"></i> Go
                            back</a>
                    </div>
                </form>
            </section>
        </section>
    </div>

</body>

</html>