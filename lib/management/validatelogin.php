<?php

include "db_connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = md5(validate($_POST['password']));

    if (empty($uname)) {
        header("Location: login.php?error=Username is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($db_conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['user_name'] = $row['username'];
                $_SESSION['name'] = $row['first_name'] . " " . $row['last_name'];
                $_SESSION['id'] = $row['id'];
                header("Location:../management");
                exit();
            } else {
                header("Location: login.php?error=Incorrect Username or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect Username or password");
            exit();
        }
    }

} else {
    header("Location:login.php");
    exit();
}
