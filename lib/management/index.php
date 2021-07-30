<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="">
        <h1 class="text-center p-4" style="background-color:#B6C867"><i>Dashboard</i></h1>
        <div class="container pt-4 text-center">

            <div class="p-5">
                <div
                    class="justify-content-center text-center align-items-center gap-2 gap-lg-5 gap-md-3 d-sm-flex d-md-inline-flex d-lg-inline-flex d-xl-inline-flex d-xxl-inline-flex">
                    <a class="p-3 btn btn-dark" href="../products" style="">
                        <?php
$result = mysqli_query($db_conn, "SELECT COUNT(item_id) AS totalit from product");
$data = mysqli_fetch_assoc($result);
echo "Items: " . $data['totalit'] . "";
?>
                    </a><br><br>
                    <a class="p-3 btn btn-dark" href="../category">
                        <?php
$result = mysqli_query($db_conn, "SELECT COUNT(id) AS totalcat from category");
$data = mysqli_fetch_assoc($result);
echo "Categories: " . $data['totalcat'] . "";
?>
                    </a><br><br>
                    <a class="p-3 btn btn-dark" href="">
                        <?php
$result = mysqli_query($db_conn, "SELECT SUM(quantity) AS totalq from product");
$data = mysqli_fetch_assoc($result);
echo "Stock Quantity: " . $data['totalq'] . "";
?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5">
        <?php require_once "footer.php";?>
    </div>
</body>

</html>