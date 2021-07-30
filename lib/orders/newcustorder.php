<?php
if (isset($_POST["subbmit"]) == true) {
    date_default_timezone_set('Asia/Kolkata');
    require_once "db_connect.php";
    $date_clicked = date('Y-m-d H:i:s');

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $custname = validate($_POST['customername']);
    $custaddr = validate($_POST['customeraddr']);
    $custphn = validate($_POST['customerphn']);
    $custitem = (int) $_POST['itemsel'];
    $custquant = $_POST['reqquant'];
    $sql = "SELECT * FROM product WHERE item_id=$custitem";
    $result = mysqli_query($db_conn, $sql);
    $row = $result->fetch_assoc();

    if ($custquant > $row['quantity']) {
        ?><script>
        window.alert("Quantity exceeded.");
        window.location.href=("../orders/customer.php");
    </script>
    <?php
} else {
        $total = $row['unit_price'] * $custquant;
        $sql = "INSERT INTO orders VALUES ('','$custname','$custaddr',$custphn,$custitem,$custquant,$total,'$date_clicked')";
        $db_conn->query($sql);
        $sql = "UPDATE product SET quantity=quantity-$custquant WHERE item_id=$custitem";
        $db_conn->query($sql);
        echo "<script>window.alert('Order accepted.Please Pay ₹. $total')</script>";?>
        <script>window.location.href=("../orders/customer.php");
    </script>
    <?php
$db_conn->close();
    }
}
?>