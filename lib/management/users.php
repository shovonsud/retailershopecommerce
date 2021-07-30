<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Users ||Admin Panel</title>
</head>

<body>
<h1 class="text-center p-4" style="background-color:#B6C867"><i>Users</i></h1>
    <div class="container-fluid">
        <div class="text-end">
        <button class="btn btn-info rounded-pill" type="button" onclick="window.location.href='register.php'">Add
            User</button>
            </div>
        <div class="table-responsive  px-md-5">
            <table class="table table-striped caption-top align-middle">
            <caption>List of users</caption>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email-ID</th>
                        <th>Phone No.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$sql = "SELECT * FROM user";
$result = $db_conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["first_name"] . " " . $row["last_name"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email_id"] . "</td><td>" . $row["phone"] . "</td></tr>";
    }
} else {echo "0 results";}
$db_conn->close();
?>
                </tbody>
            </table>
        </div>
        <?php
require_once "footer.php";?>
    </div>
</body>

</html>