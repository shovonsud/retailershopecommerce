<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Add Item</title>
</head>

<body>
    <div class="container-fluid">
        <section class="row justify-content-center">
            <h1 class="text-center p-4 mb-5" style="background-color:#B6C867"><i>Add Item</i></h1>
            <section class="col-md-8 col-lg-8 col-xl-6 col-xxl-6 rounded" style="background-color:#DBE6FD">
                <form class="p-3" method="POST" action="newitem.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="p-1 col-7 col-sm-5 mb-3">
                            <label>Item ID</label>
                            <input class="form-control border border-dark rounded" type="number" readonly name="itemid"
                                placeholder="System generated" style="cursor:no-drop;">
                        </div>
                        <div class="px-1 col-6 mb-3 justify-content-center text-center">
                            <img class="border border-dark rounded mx-auto d-block mb-2" alt="Upload Picture"
                                id="itempicpreview" name="itempicpreview" height="150" width="150" />
                            <div class="d-flex justify-content-center">
                                <label for="pic_upload" class="btn btn-info">
                                    <i class="fas fa-file-image"></i> Upload
                                </label>
                                <input id="pic_upload" class="pic_upload" name="itempic" type="file" accept="image/*"
                                    required onchange="preview_image(event)" />
                                <p id="picuploadalert" class="ms-1 fw-light fst-italic">*Required</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 col-12 mb-3">
                            <label>Item Name</label>
                            <input class="form-control border border-dark rounded" type="text" name="itemname" autofocus
                                required placeholder="Item Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 col-6 mb-3">
                            <label>Variant</label>
                            <input class="form-control border border-dark rounded" type="text" name="itemvariant"
                                required placeholder="Variant" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 col-12 mb-3">
                            <label>Select Category</label>
                            <?php
$sql = "SELECT * FROM category";
$result = mysqli_query($db_conn, $sql);
echo "<select class='form-select border border-dark rounded' name='catset' required>";
echo "<option value=''>Select</option>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select>";
?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="px-1 col-6">
                            <label>Unit Price</label>
                            <div class="input-group border border-dark rounded">
                                <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                                <input class="form-control" type="number" step="0.001" min="0.001" required
                                    name="unit_price" placeholder="Enter unit price">
                            </div>
                        </div>
                        <div class="px-1 col-6">
                            <label>Quantity</label>
                            <input class="form-control border border-dark rounded" type="number" min="1" name="quantity"
                                required placeholder="Enter purchased-stock quantity">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="px-1 col-6">
                            <label>Status</label>
                            <select class="form-select border border-dark rounded" name="itemstatus" required>
                                <option value=''>Select</option>
                                <option value="1">Active</option>
                                <option value="2">Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <button class="col-12 btn btn-primary" type="submit" name="submit2" value="Submit">Add
                            Item</button>
                    </div>
                </form>
            </section>
        </section>
    </div>
    <?php
require_once "footer.php";?>
</body>

</html>