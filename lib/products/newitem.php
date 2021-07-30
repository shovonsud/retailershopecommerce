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
        $itemstatus = $_POST['itemstatus'];
        $catset = (int) $_POST['catset'];
        $unit_price = $_POST['unit_price'];
        $quantity = $_POST['quantity'];
        $sql = "INSERT INTO product VALUES ('','$itemname',$catset,$unit_price,$quantity,$itemstatus)";
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