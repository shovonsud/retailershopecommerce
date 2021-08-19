<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Products</title>
</head>

<body>
    <h1 class="text-center p-4" style="background-color:#B6C867"><i>Items</i></h1>
    <div class="container-fluid">
        <div class="text-end mb-1">
            <a class="btn btn-info rounded-pill" href="edititem.php">Edit Item</a>
            <a class="btn btn-info rounded-pill" href="add_item.php">Add Item</a>
        </div>
        <div class="px-md-5">
            <div class="table-responsive tablerep">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Variant</th>
                            <th scope="col">Category</th>
                            <th scope="col">Unit Price (<i class="fas fa-rupee-sign"></i>)</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$sql = "SELECT a.*,b.name FROM product a,category b WHERE a.cat_id=b.id ORDER BY a.item_id ASC;";
$result = $db_conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["item_status"] == 1) {
            $itemstat = "Active";
        } else {
            $itemstat = "Disabled";
        }
        ?>
                        <tr>
                            <td><?php echo $row['item_id']; ?></td>
                            <td class="d-flex"><img class="border" src="<?php echo $row['picturefilepath']; ?>" width="50" height="50" />
                                <div class="ms-2"><?php echo $row['item_name']; ?></div>
                            </td>
                            <td><?php echo $row['variant']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['unit_price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $itemstat; ?></td>
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
    </div>
</body>
<?php
require_once "footer.php";?>

</html>