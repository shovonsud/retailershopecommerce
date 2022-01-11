<?php
session_start();
require_once "db_connect.php";
date_default_timezone_set('Asia/Kolkata');
if (isset($_POST["cartsubmit"]) == true) {
    $date_clicked = date('Y-m-d H:i:s');
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function generateID()
    {
        return "ORD" . time() . rand(1000, 9999999);
    }
    $gen_or_id = generateID();
    $pay_method = validate($_POST['paymentmethod']);
    $custname = validate($_POST['customername']);
    $custaddr = "";
    if (!empty($_POST['customeraddr'])) {
        $custaddr = validate($_POST['customeraddr']);
    } else {
        $custaddr = "N/A";
    }
    $carttotal = validate($_POST['carttotal']);
    $custphn = validate($_POST['customerphn']);
    $cartitems = array();
    $cartstatus = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $itemid => $value) {
            array_push($cartitems, array("itemid" => $itemid, "qty" => $value['qty']));
            $qty = $value['qty'];
            $sql2 = "UPDATE product SET quantity=quantity-$qty WHERE item_id=$itemid";
            mysqli_query($db_conn, $sql2);
        }
        if (isset($_SESSION['logged_in'])) {
            $cartstatus = 1;
        }
        $cartitems = json_encode($cartitems);
        $sql = "INSERT into orders VALUES('','$gen_or_id','$custname','$custaddr','$custphn','$cartitems',$carttotal,$cartstatus,'$date_clicked')";
        if (mysqli_query($db_conn, $sql)) {
            unset($_SESSION['cart']);
            if ($pay_method == "Cash") {
                header("Location:../orders/order.php");
            } elseif ($pay_method == "Online") {
                $gen_or_id = base64_encode($gen_or_id);
                $carttotal = base64_encode($carttotal);
                header("Location:./PaytmKit/TxnTest.php?id=$gen_or_id&carttotal=$carttotal");
            }
        } else {
            echo $db_conn->error;
        }
    }
}
