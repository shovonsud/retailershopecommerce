<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    require_once "db_connect.php";
    if (isset($_POST["submit1"]) == true) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $categoryname = validate($_POST['categoryname']);
        $categorystatus = validate($_POST['categorystatus']);
        $sql = "INSERT INTO category (name, status) values ('$categoryname','$categorystatus')";
        if ($db_conn->query($sql)) {
            ?><script>
            window.alert("New Category Added Successfully.");
            window.location.href=("../category/");
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