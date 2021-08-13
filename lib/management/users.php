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
            <a class="btn btn-info rounded-pill" href="../management/register.php">Add
                User</a>
        </div>
        <div class="px-md-5">
            <div class="table-responsive">
                <table class="table table-striped caption-top align-middle">
                    <caption>List of users</caption>
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email-ID</th>
                            <th scope="col">Phone No.</th>
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
        </div>
        <?php
require_once "footer.php";?>
    </div>
</body>

</html>