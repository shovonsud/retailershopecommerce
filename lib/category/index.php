<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Category</title>
</head>

<body>
<h1 class="text-center p-4" style="background-color:#B6C867"><i>Categories</i></h1>
    <div class="container-fluid">

        <div class="text-end">
            <button class="btn btn-info rounded-pill" type="button"
                onclick="window.location.href='editcategory.php'">Edit Category</button>
            <button class="btn btn-info rounded-pill" type="button"
                onclick="window.location.href='add_category.php'">Add Category</button>
        </div>
        <div class="table-responsive  px-md-5">
            <table class="table table-striped caption-top align-middle">
                <caption>List of catogories</caption>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$sql = "SELECT * FROM category";
$result = $db_conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["status"] == 1) {
            $catstat = "Active";
        } else {
            $catstat = "Disabled";
        }
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $catstat . "</td></tr>";
    }
} else {echo "0 results";}
$db_conn->close();
?>
                </tbody>
            </table>
        </div>
        <?php
require_once "footer.php";?>
</body>

</html>