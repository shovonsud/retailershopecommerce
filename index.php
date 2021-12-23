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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Portal</title>
</head>

<body style="background-color:#DEEDF0">
    <div class="container">
        <div class="navbar-brand text-center mt-5" style="font-size:50px">
            <img src="./assets/images/icon.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
            LIFE <i class="fab fa-internet-explorer fa-xs"></i> Shop
        </div>
        <div class="position-absolute top-50 start-50 translate-middle">
            <div
                class="justify-content-evenly text-center align-items-center gap-2 gap-lg-5 gap-md-3 d-sm-flex d-md-flex d-lg-inline-flex d-xl-inline-flex d-xxl-inline-flex">
                <a class="btn btn-warning" id="custport" target="_self" href="lib/orders/order.php" role="button">
                    <h1>Customer Portal</h1>
                </a><br><br>
                <a class="btn btn-info" id="mgmtport" target="_self" href="lib/management" role="button">
                    <h1>Management Portal</h1>
                </a>
            </div>
        </div>
        <div class="position-absolute  bottom-0 end-0">
            <?php require_once "footer.php";?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>