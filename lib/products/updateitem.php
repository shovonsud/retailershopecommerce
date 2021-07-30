<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    require_once "db_connect.php";
    if (isset($_POST["submit4"]) == true) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $itemname = validate($_POST['newitname']);
        $itemstatus = $_POST['newstat'];
        $id = (int) validate($_POST['itemid']);
        $catid = (int) validate($_POST['newcatset']);
        $uprice = validate($_POST['itemrate']);
        $quant = validate($_POST['itemq']);
        $sql = "UPDATE product SET item_name = '$itemname',cat_id=$catid,unit_price=$uprice,quantity=$quant, item_status=$itemstatus WHERE item_id=$id";
        if ($db_conn->query($sql)) {
            ?><script>
            window.alert("Item Updated Successfully.");
            window.location.href=("../products");
            </script>
            <?php
} else {
            echo "Error: " . $sql . " " . $db_conn->error;
        }
    }
    $db_conn->close();
} else {
    header("Location:../management");
}

?>