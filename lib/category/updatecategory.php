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
        $categoryname = validate($_POST['newcatname']);
        $categorystatus = $_POST['newstat'];
        $id = (int) $_POST['catid'];
        $sql = "UPDATE category SET name = '$categoryname', status=$categorystatus WHERE id=$id";
        if ($db_conn->query($sql)) {
            ?><script>
            window.alert("Category Updated Successfully.");
            window.location.href=("../category/");
            </script>
            <?php
} else {
            echo "Error: " . $sql . " " . $db_conn->error;
        }
        $db_conn->close();
    }
} else {
    header("Location:../management");
}

?>