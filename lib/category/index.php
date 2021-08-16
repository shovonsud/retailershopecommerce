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

        <div class="text-end mb-1">
            <a class="btn btn-info rounded-pill" href="editcategory.php">Edit Category</a>
            <a class="btn btn-info rounded-pill" href="add_category.php">Add Category</a>
        </div>
        <div class="px-md-5">
            <div class="table-responsive tablerep">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
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
        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $catstat; ?></td>
                        </tr>
                        <?php
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
</body>

</html>