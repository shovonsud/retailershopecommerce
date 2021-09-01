<?php
require_once '../orders/cartsystem.php';
require_once 'db_connect.php';
$state = 0;
if (isset($_POST['method'])) {
    $method = $_POST['method'];
    $state = 1;
}
if (isset($_POST['itemid'])) {
    $cartitemid = $_POST['itemid'];
    $state = 1;
}
if (isset($_POST['itemquantity'])) {
    $itemquant = $_POST['itemquantity'];
    $state = 1;
}
if (!isset($_SESSION)) {
    session_start();
}
$obj = new cart();
if ($state == 1) {
    if ($method == 'add') {
        $obj->addProduct($cartitemid, $itemquant);
    } else if ($method == 'sub') {
        if ($itemquant == 0) {
            $obj->removeProduct($cartitemid);
        } else {
            $obj->updateProduct($cartitemid, $itemquant);
        }
    } else if ($method == 'remove') {
        $obj->removeProduct($cartitemid);
    } else if ($method == 'emptycart') {
        $obj->emptycart();
        exit();
    }

}
$cartdetails = array();
//$carttotal = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $itemid => $value) {
        $result = mysqli_query($db_conn, "SELECT * from product where item_id=$itemid");
        $row = mysqli_fetch_assoc($result);
        //$carttotal = $carttotal + ($value['qty'] * $row['unit_price']);
        array_push($cartdetails, array("itemid" => $itemid, "name" => $row['item_name'], "variant" => $row['variant'], "rate" => $row['unit_price'], "reqquant" => $value['qty'], "imagefilepath" => $row['picturefilepath']));
    }
    //$obj->setCartTotal($carttotal);
}
$cartdetails["itemcount"] = $obj->totalItems();
echo json_encode($cartdetails);
