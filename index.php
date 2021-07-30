<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../../assets/images/icon.png">
    <link href='assets/style/style.css' rel='stylesheet'>
    <title>Portal</title>
</head>

<body style="background-color:#0A1931">
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div
                class="justify-content-evenly text-center align-items-center gap-2 gap-lg-5 gap-md-3 d-sm-flex d-md-flex d-lg-inline-flex d-xl-inline-flex d-xxl-inline-flex">
                <a class="btn btn-warning" target="_self" href="lib/orders/order.php" role="button">
                    <h1>Customer Portal</h1>
                </a><br><br>
                <a class="btn btn-info" target="_self" href="lib/management" role="button">
                    <h1>Management Portal</h1>
                </a>
            </div>
        </div>
        <div class="position-absolute  bottom-0 end-0">
            <?php require_once "footer.php";?>
        </div>
    </div>
</body>

</html>