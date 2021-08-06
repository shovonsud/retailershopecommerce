<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    require_once "management_panel.php";
} else {
    require_once "db_connect.php";
}

?>
<!DOCTYPE html>

<head>
    <title>Customer Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='../../assets/style/style.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="../../assets/images/icon.png">
</head>

<body>
    <script type="text/javascript">
        function getitemdetails() {
            document.getElementById("availquant").value = document.getElementById("itemselect").value;
        }
    </script>
    <h1 class="text-center p-4" style="background-color:#B6C867"><i>New Order</i></h1>
    <?php if (isset($_SESSION['logged_in']) == false) {
    echo "<div class='text-end'>";
    echo "<a class='btn btn-info rounded-pill mb-2' href='../../'>Shop Portal</a></div>";
}

?>
    <div class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-md-8 col-lg-8 col-xl-10 col-xxl-10 rounded" style="background-color:#DBE6FD">
                <form class="p-1 p-sm-4 mb-1" method="POST" action="neworder.php">
                    <div class="row d-flex justify-content-between">
                        <div class="p-1 col-8 col-sm-6 mb-3">
                            <label class="fw-bold">Customer Name</label>
                            <input class="form-control border border-dark rounded" type="text" name="customername"
                                autofocus placeholder="Enter Customer Name" required>
                        </div>
                    </div>
                    <div class="row align-items-center  d-flex justify-content-between">
                        <div class="px-1 col-6 mb-3">
                            <label class="fw-bold">Customer Address</label>
                            <textarea class="form-control border border-dark rounded" rows="3" name="customeraddr"
                                placeholder="Enter Customer Address" required></textarea>
                        </div>

                        <div class="px-1 col-6 col-sm-5 col-md-5 col-lg-4 mb-3">
                            <label class="fw-bold">Customer Phone</label>
                            <input class="form-control border border-dark rounded" type="text" name="customerphn"
                                placeholder="Enter Phone no." required minlength="10" maxlength="10" size="10"
                                pattern="\d{10}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 col-12 mb-3">
                            <label class="fw-bold">Choose Item</label>
                            <?php
$sql = "SELECT a.*,b.* FROM product a,category b WHERE a.cat_id=b.id ORDER BY a.item_id ASC";
$result = mysqli_query($db_conn, $sql);
echo "<select class='form-select border border-dark rounded' name='itemsel' id='itemselect' style='cursor:grab' required onchange='getitemdetails()'>";
echo "<option value=''>Select</option>";
while ($row = $result->fetch_assoc()) {
    if ($row['item_status'] == 1 && $row['status'] == 1) {
        echo "<option value='" . $row['item_id'] . "'>" . $row['item_name'] . '  --> Avail. Quantity: ' . $row['quantity'] . '  --> Rate: ₹' . $row['unit_price'] . "</option>";
    }

}
echo "</select>";
$db_conn->close();
?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 col-12 mb-3">
                            <label class="fw-bold">Item ID</label>
                            <input class="form-control border border-dark rounded" type="number" id="availquant"
                                readonly placeholder="Select Item" style="cursor:no-drop">
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 col-5 col-md-4 mb-3">
                            <label class="fw-bold">Required Quantity</label>
                            <input class="form-control border border-dark rounded" type="number" name="reqquant"
                                required pattern="\d" min="1" placeholder="Enter req. quantity">
                        </div>
                    </div>
                    <button class="col-12 btn btn-primary" type="submit" name="subbmit" value="Submit">Confirm
                        Order</button>
                </form>
            </section>
        </section>
    </div>
    <?php
require_once "footer.php";?>
</body>

</html>