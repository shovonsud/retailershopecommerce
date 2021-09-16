<?php
require_once "db_connect.php";
session_start();
if (isset($_SESSION['logged_in'])) {
    $orderid = 0;
    if (isset($_POST['unattendedorderid'])) {
        $orderid = $_POST['unattendedorderid'];
    } else {
        header("Location: ../orders/view_order.php?orderid=$orderid");
    }

    $sql = "UPDATE orders SET order_attended=1 WHERE order_id=$orderid";
    if (mysqli_query($db_conn, $sql)) {
        header("Location: ../orders/view_order.php?orderid=$orderid");
    } else {
        header("Location: ../management");
    }

} else {
    header("Location:../management/");
}
