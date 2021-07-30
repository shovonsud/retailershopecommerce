<?php
require_once "management_panel.php";
?>
<!DOCTYPE html>

<head>
    <title>Add Category</title>
</head>

<body>
    <div class="container-fluid">
        <section class="row justify-content-center">
            <h1 class="text-center p-4 mb-5" style="background-color:#B6C867"><i>Add Category</i></h1>
            <section class="p-4 col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-4 rounded"
                style="background-color:#DBE6FD">
                <form method="POST" action="newcategory.php" style="">
                    <div class="row">
                        <div class="px-1 col-12 form-floating  mb-3">
                            <input type="text" class="form-control" id="catename" name="categoryname"
                                placeholder="Category Name" required>
                            <label for="catename">Category Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 col-12 mb-3">
                            <label>Category ID</label>
                            <input class="form-control" type="number" readonly disabled name="categoryid"
                                placeholder="System generated">

                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 col-12  mb-3">
                            <label>Status</label>
                            <select class="form-select" name="categorystatus" required>
                                <option value=''>Select</option>
                                <option value="1">Active</option>
                                <option value="2">Disabled</option>
                            </select>
                        </div>
                    </div>
                    <button class="col-12 btn btn-primary submitnewcat" name="submit1" type="submit" value="Submit">Add
                        Category</button>
                </form>
            </section>
        </section>

    </div>
    <?php
require_once "footer.php";?>
</body>


</html>