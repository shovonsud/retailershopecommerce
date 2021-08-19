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
        $itemvariant = validate($_POST['newitvar']);
        $itemstatus = $_POST['newstat'];
        $id = (int) validate($_POST['itemid']);
        $catid = (int) validate($_POST['newcatset']);
        $uprice = validate($_POST['itemrate']);
        $quant = validate($_POST['itemq']);
        $sql = "";
        if (is_uploaded_file($_FILES["changeitempic"]["tmp_name"])) {
            $newfilename = "Item" . $id;
            $extension = pathinfo($_FILES["changeitempic"]["name"], PATHINFO_EXTENSION);
            $basename = $newfilename . "." . $extension;
            $source = $_FILES["changeitempic"]["tmp_name"];
            $destination = "../../assets/images/products/{$basename}";
            $sql2 = "SELECT picturefilepath from product where item_id=$id";
            $result = $db_conn->query($sql2);
            $imgfilepath = "";
            if ($result->num_rows === 1) {
                while ($row = $result->fetch_assoc()) {
                    $imgfilepath = $row['picturefilepath'];
                }
            }
            if (file_exists($imgfilepath)) {
                unlink($imgfilepath);
            }
            $sql = "UPDATE product SET item_name = '$itemname',variant = '$itemvariant',picturefilepath='$destination',cat_id=$catid,unit_price=$uprice,quantity=$quant, item_status=$itemstatus WHERE item_id=$id";
            move_uploaded_file($source, $destination);
        } else {
            $sql = "UPDATE product SET item_name = '$itemname',variant = '$itemvariant',cat_id=$catid,unit_price=$uprice,quantity=$quant, item_status=$itemstatus WHERE item_id=$id";
        }
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