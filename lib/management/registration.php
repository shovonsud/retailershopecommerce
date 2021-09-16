<?php
session_start();
include "db_connect.php";
if (isset($_POST['submit'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $pas = md5($pass);
    if (empty($uname)) {
        header("Location: register.php?error=Username is required");
        exit();
    } else if (empty($pass)) {
        header("Location: register.php?error=Password is required");
        exit();
    } else if ($_POST['password'] != $_POST['cpass']) {
        header("Location:register.php?error=Passwords do not match!");
        exit();
    } else {
        $fname = validate($_POST['fname']);
        $lname = validate($_POST['lname']);
        $email = validate($_POST['email']);
        $phn = validate($_POST['phn']);
        $sql = "INSERT INTO user (first_name,last_name,email_id,phone,username,password) VALUES ('$fname','$lname','$email','$phn','$uname','$pas')";
        if ($db_conn->query($sql)) {
            if (isset($_SESSION['logged_in'])) {
                ?><script>
                window.alert("New User Added Successfully.");
                window.location.href=("../management/users.php");
                </script>
                <?php
} else {
                ?><script>
                window.alert("New User Added Successfully.");
                window.location.href=("./");
                </script>
                <?php
}
        } else {
            echo "Error: " . $sql . " " . $db_conn->error;
        }

    }
} else {
    header("Location: register.php");
    exit();
}