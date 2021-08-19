<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    require_once "db_connect.php";
    if (isset($_POST["submit2"]) == true) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $itemname = validate($_POST['itemname']);
        $itemvarint = validate($_POST['itemvariant']);
        $itemstatus = $_POST['itemstatus'];
        $catset = (int) $_POST['catset'];
        $unit_price = $_POST['unit_price'];
        $quantity = $_POST['quantity'];
        /* Picture Upload */
        $sql = "select max(item_id) as lastid from product";
        $result = mysqli_query($db_conn, $sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
        }
        $destination = "";
        $itemid = $row['lastid'] + 1;
        if (isset($_FILES["itempic"])) {
            $newfilename = "Item" . $itemid;
            $extension = pathinfo($_FILES["itempic"]["name"], PATHINFO_EXTENSION); // jpg
            $basename = $newfilename . "." . $extension; // filename.jpg
            $source = $_FILES["itempic"]["tmp_name"];
            $destination = "../../assets/images/products/{$basename}";
            /* move the file */
            move_uploaded_file($source, $destination);
        }
        $sql = "INSERT INTO product VALUES ('','$itemname','$itemvarint','$destination',$catset,$unit_price,$quantity,$itemstatus)";
        if ($db_conn->query($sql)) {
            ?><script>
            window.alert("New Item added.");
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