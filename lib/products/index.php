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
        <div class="text-end">
            <button class="btn btn-info rounded-pill" type="button" onclick="window.location.href='edititem.php'">Edit
                Item</button>
            <button class="btn btn-info rounded-pill" type="button" onclick="window.location.href='add_item.php'">Add
                Item</button>
        </div>
        <div class="table-responsive  px-md-5">
            <table class="table table-striped caption-top align-middle">
                <caption>List of Items</caption>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Unit Price<i class="fas fa-rupee-sign"></i></th>
                        <th>Quantity</th>
                        <th>Status</th>
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
        echo "<tr><td>" . $row["item_id"] . "</td><td>" . $row["item_name"] . "</td><td>" . $row["name"] . "</td><td>" . $row["unit_price"] . "</td><td>" . $row["quantity"] . "</td><td>" . $itemstat . "</td></tr>";
    }
} else {echo "0 results";}
$db_conn->close();
?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php
require_once "footer.php";?>

</html>