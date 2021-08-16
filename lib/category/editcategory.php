<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Edit Category</title>
</head>

<body>
    <div class="container-fluid">
        <section class="row justify-content-center">
            <h1 class="text-center p-4" style="background-color:#B6C867"><i>Edit Category</i></h1>
            <section class="p-4 col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-4 rounded"
                style="background-color:#DBE6FD">
                <form class="" method="POST" action="#">
                    <div class="row">
                        <div class="px-1 col-12  mb-3">
                            <label>Select Category</label>
                            <?php
$sql = "SELECT * FROM category";
$result = mysqli_query($db_conn, $sql);
echo "<select class='form-select' name='catset' required>";
echo "<option value=''>Select</option>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select>";
?>
                            <br>
                            <button class="btn btn-info" name="submit3" type="submit" value="Submit">Fetch
                                Details</button>
                        </div>
                    </div>
                </form>
                <?php
if (isset($_POST["submit3"]) == true) {
    $x = (int) $_POST['catset'];
    $sql = "SELECT * FROM category a WHERE a.id=$x";
    $result = $db_conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();?>
                <hr>
                <div>
                    <form class="" method="POST" action="updatecategory.php">
                        <div class="row">
                            <div class='px-1 col-12 mb-3'>
                                <label>Category ID</label>
                                <input class='form-control' type='number' name='catid' readonly value=<?php echo $x; ?>>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='px-1 col-12 mb-3'>
                                <label>New Category Name</label>
                                <input class="form-control" type="text" name="newcatname" required
                                    value="<?php echo $row["name"]; ?>">
                            </div>
                        </div>
                        <div class='row'>
                            <div class='px-1 col-12 mb-3'>
                                <label>Status</label>
                                <?php
echo "<select class='form-select' name='newstat' required>";
        if ($row["status"] == 1) {
            $catstat = "Active";
            ?>
                                <option value="<?php echo $row["status"]; ?>" selected><?php echo $catstat; ?></option>
                                <option value="2">Disabled</option>
                                <?php
} else {
            $catstat = "Disabled";
            ?>
                                <option value="1">Active</option>
                                <option value="<?php echo $row['status']; ?>" selected>$catstat</option>
                                <?php
}
        ?>
                                </select>
                            </div>
                        </div>
                        <button class='col-12 btn btn-primary submitnewcat' name='submit4' type='submit'
                            value='Submit'>Update</button>
                    </form>
                </div>
                <?php
}
}
?>
            </section>
        </section>
    </div>
    <?php
require_once "footer.php";?>
</body>

</html>