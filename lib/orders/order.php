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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/cart.js"></script>
</head>

<body>
    <h1 class="text-center p-4" style="background-color:#B6C867"><i>New Order</i></h1>
    <?php if (isset($_SESSION['logged_in']) == false) {
    echo "<div class='text-end'>";
    echo "<a class='btn btn-info bg-gradient rounded-pill mb-2' href='../../'>Shop Portal</a></div>";
}
?>
    <div class="container-fluid">
        <div class="">
            <button type="button" class="btn btn-dark bg-gradient rounded-pill" onclick="emptycart()">New Order/Delete
                Cart</button>
        </div>
        <div class="mt-2 align-items-center d-flex flex-row-reverse">

            <a class="cart btn btn-warning bg-gradient d-inline-flex" href="../orders/cartcheckout.php">Cart
                <div class="position-relative">
                    <i class="fas fa fa-shopping-cart fa-lg"></i>
                    <span id="incartcount"
                        class="text-black cart-basket d-flex align-items-center justify-content-center"></span>
                </div>
            </a>
            <marquee behavior="alternate" class="rainbow fw-bold" style="width:200px;"><i
                    class="fas fa-star"></i>Checkout Here!>></marquee>
        </div>
        <div class="d-md-inline-flex mt-1">
            <section class="" style="min-width:15%;">
                <nav class="navbar navbar-expand-xl navbar-light">
                    <div class="container-fluid d-block">
                        <div class="d-inline-flex">
                            <div class="navbar-brand">Categories</div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse2" aria-controls="collapse2" aria-expanded="false"
                                aria-label="Toggl4 navigation">
                                <span class="fas fa-filter"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="collapse2">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-inline-block d-lg-block">
                                <li class="nav-item">
                                    <a class="nav-link" href="../orders/order.php">All</a>
                                </li>
                                <?php
$sql = "SELECT * FROM category where status=1 ORDER BY name ASC";
$result = mysqli_query($db_conn, $sql);
while ($row = $result->fetch_assoc()) {
    ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="../orders/order.php?category=<?php echo $row['id']; ?>"><?php echo $row["name"]; ?>
                                    </a>
                                </li>
                                <?php
}
?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </section>
            <section class="px-md-4">
                <div class="row">
                    <?php
$sql = "";
if (isset($_GET['category'])) {
    $cat = $_GET['category'];
    $sql = "SELECT * FROM product WHERE cat_id=$cat ORDER BY quantity DESC,item_id ASC";
} else {
    $sql = "SELECT a.*,b.* FROM product a,category b WHERE a.cat_id=b.id AND b.status=1 AND a.item_status=1 ORDER BY quantity DESC,a.item_id ASC";
}
$result = mysqli_query($db_conn, $sql);
while ($row = $result->fetch_assoc()) {
    ?>
                    <div class="col-6 col-sm-4 col-md-3 offset-md-1 mb-5 shadow" style="background-color:#F4F9F9;">
                        <div class="p-1 rounded-3 position-relative" style="min-height:230px !important;background-color:#F4F9F9;">

                            <div>
                                <span class="position-absolute float-start rounded alert-success fw-bold px-1"
                                    id="<?php echo 'incart' . $row["item_id"]; ?>"></span>
                                <?php
if ($row['quantity'] == 0) {
        echo "<span class=' position-absolute mx-auto outofstock rounded alert-danger fw-bold px-1'>Out of Stock</span>";
    }
    ?>
                                <div class="text-center">
                                    <img height="100" width="100" src="<?php echo $row['picturefilepath']; ?>" />
                                </div>
                                <div><?php echo $row['item_name']; ?></div>
                            </div>
                            <div
                                class="variant me-1 mt-1 p-1 text-center bg-secondary text-white fw-bold rounded-circle">
                                <?php echo $row['variant']; ?></div>
                            <div class="fw-bold"><i class="fas fa-rupee-sign me-1"></i><?php echo $row['unit_price']; ?>
                            </div>
                            <div class="bg-info d-none">In-Stock: <span
                                    id="<?php echo 'quantity' . $row["item_id"]; ?>"><?php echo $row['quantity']; ?></span>
                            </div>
                            <?php
if ($row['quantity'] > 0) {
        ?>
                            <div class="mt-2 d-flex flex-row-reverse">
                                <section class="d-flex align-items-center">
                                    <button type="button" id="<?php echo $row['item_id']; ?>" class="btn removecartbtn"
                                        onclick="removefromcart('<?php echo $row['item_id']; ?>')"><span
                                            class="fas fa-minus"></span>
                                    </button>
                                    <div class="border rounded p-1 bg-info mx-2"><span class="fw-bold p-2"
                                            id="<?php echo 'cartvalue' . $row["item_id"]; ?>">0</span></div>
                                    <button type="button" id="<?php echo $row['item_id']; ?>" class="btn addcartbtn"
                                        onclick="addtocart('<?php echo $row['item_id']; ?>')"><span
                                            class="fas fa-plus"></span>
                                    </button>
                            </div>
                            <?php
}
    ?>
                        </div>
                    </div>
                    <?php
}
?>
                </div>
            </section>
        </div>
    </div>
    <div id="incartcount6" class="text-center"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>