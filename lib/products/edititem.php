<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Edit Item</title>
</head>

<body>
    <div class="container-fluid">
        <section class="row justify-content-center">
            <h1 class="text-center p-4" style="background-color:#B6C867"><i>Edit Item</i></h1>
            <section class="p-4 col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-4 rounded"
                style="background-color:#DBE6FD">
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="row">
                        <div class="px-1 col-12  mb-3">
                            <label>Select Item</label>
                            <?php
$sql = "SELECT * FROM product";
$result = mysqli_query($db_conn, $sql);
echo "<select class='form-select' name='itemset' required>";
echo "<option value=''>Select</option>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['item_id'] . "'>" . $row['item_id'] . ". " . $row['item_name'] . "</option>";
}
echo "</select>";
?>
                            <br>
                            <button class="btn btn-info submitnewcat" name="submit8" type="submit" value="Submit">Fetch
                                Details</button>
                        </div>
                    </div>
                </form>
                <?php
if (isset($_POST["submit8"]) == true) {
    $x = (int) $_POST['itemset'];
    $sql = "SELECT * FROM product a WHERE a.item_id=$x";
    $result = $db_conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();?>
                <hr>
                <form method="POST" action="updateitem.php" enctype="multipart/form-data">
                    <div class="row align-items-center">
                        <div class='px-1 col-6 mb-3'>
                            <label>Item ID</label>
                            <input class="form-control border border-dark rounded" type='number' name='itemid'
                                value=<?php echo "$x"; ?> readonly style="cursor:no-drop;background-color:#E1E8EB">
                        </div>
                        <div class="px-1 col-6 mb-3">
                            <img class="border border-dark rounded mx-auto d-block mb-2" alt="Item Picture Missing"
                                src="<?php echo $row['picturefilepath']; ?>" id="itempicpreview" name="itempicpreview"
                                height="150" width="150" />
                            <div class="d-flex justify-content-center">
                                <label for="pic_upload" class="btn btn-info">
                                    <i class="fas fa-file-image"></i> Change Picture
                                </label>
                                <input id="pic_upload" class="pic_upload" name="changeitempic" type="file"
                                    accept="image/*" onchange="preview_image(event)" />
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='px-1 col-12 mb-3'>
                            <label>New Item Name</label>
                            <?php
echo "<input class='form-control border border-dark rounded' type='text' name='newitname' value='$row[item_name]' required placeholder='" . $row['item_name'] . "'>";
        ?>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='px-1 col-6 mb-3'>
                            <label>New Variant</label>
                            <?php
echo "<input class='form-control border border-dark rounded' type='text' name='newitvar' value='$row[variant]' required placeholder='" . $row['variant'] . "'>";
        ?>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='px-1 col-12 mb-3'>
                            <label>Select Item Category</label>
                            <?php
$isql = "SELECT * FROM category";
        $iresult = mysqli_query($db_conn, $isql);
        echo "<select class='form-select border border-dark rounded' name='newcatset' required>";
        while ($irow = $iresult->fetch_assoc()) {
            if ($irow['id'] == $row['cat_id']) {
                echo "<option value='" . $irow['id'] . "' selected>" . $irow['name'] . "</option>";
            } else {
                echo "<option value='" . $irow['id'] . "'>" . $irow['name'] . "</option>";
            }
        }
        echo "</select>";
        $price = (int) $row['unit_price'];?>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='px-1 col-6 mb-3'>
                            <label>New Item Rate (₹)</label>
                            <input class="form-control border border-dark rounded" type='number' name='itemrate'
                                value=<?php echo "$price"; ?> required>
                            <?php
$qu = (int) $row['quantity'];?>
                        </div>
                        <div class='px-1 col-6 mb-3'>
                            <label>New Item Quantity</label>
                            <input class="form-control border border-dark rounded" type='number' name='itemq'
                                value=<?php echo "$qu"; ?> required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='px-1 col-6 mb-3'>
                            <label>Status</label>
                            <select class="form-select border border-dark rounded" name='newstat' required>
                                <?php
if ($row["item_status"] == 1) {
            $itstat = "Active";

            echo "<option value='" . $row['item_status'] . "' selected>$itstat</option>";
            echo "<option value='2'>Disabled</option>";
        } else {
            $itstat = "Disabled";
            echo "<option value='1'>Active</option>";
            echo "<option value='" . $row['item_status'] . "' selected>$itstat</option>";
        }
    }
    $db_conn->close();
    ?>
                            </select>
                        </div>
                    </div>
                    <?php
echo "<button class='col-12 btn btn-primary' name='submit4' type='submit' value='Submit'>Update</button>"; ?>
                </form>
                <?php
}
?>
            </section>
        </section>
    </div>
    <?php
require_once "footer.php";?>
</body>

</html>