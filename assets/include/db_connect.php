<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "inventorycontrolsystem";
$db_conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
if ($db_conn->connect_error) {
    die("Connection failed: " . $db_conn->connect_error);
}
