<?php
session_start();
if (isset($_SESSION['id'])) {
    require_once "management_panel.php";
}
?>

<!DOCTYPE html>

<head>
    <title>Admin Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="../../assets/images/icon.png">
    <link rel="icon" type="image/png" href="../images/icon.png">
</head>

<body style="">
    <section class="container-fluid">
        <section class="row justify-content-center">
            <h1 class="text-center p-4" id="" style="background-color:#B6C867">Management Registration</h1>
            <section class="pt-5 col-md-8 col-lg-8 col-xl-6 col-xxl-6" style="">
                <form class="p-4 border border-dark rounded bg-dark" id="rform" action="registration.php" method="POST">
                    <h2 class="row py-1 mb-3 bg-info rounded"><i class="ms-1">Registration Form</i></h2>
                    <?php if (isset($_GET['error'])) {?>
                    <div class="alert alert-danger" role="alert"><?php echo $_GET['error']; ?></div>
                    <?php }?>
                    <div class="row">
                        <div class="px-1 col-6 form-floating mb-3">
                            <input class=" form-control border border-dark rounded" type="text" id="fsname" required
                                name="fname" placeholder="Firstname" />
                            <label for="fsname" class="">Firstname</label>
                        </div>
                        <div class="px-1 col-6 form-floating mb-3">
                            <input class="form-control border border-dark rounded" type="text" id="lsname" required
                                name="lname" placeholder="Lastname">
                            <label class="form-label" for="lsname">Lastname</label>
                        </div>
                        <div class="px-1 col-12 col-sm-6 form-floating mb-3">
                            <input class="form-control border border-dark rounded" type="text" required id="emaili"
                                name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" placeholder="Email ID">
                            <label class="form-label" for="emaili">Email ID</label>
                        </div>
                        <div class="px-1 col-6 form-floating mb-3">
                            <input class="form-control border border-dark rounded" type="text" required id="phnno"
                                name="phn" minlength="10" maxlength="10" size="10" pattern="\d{10}"
                                placeholder="Phone Number">
                            <label class="form-label" for="phnno">Phone</label>
                        </div>
                        <div class="px-1 col-6 form-floating mb-3">
                            <input class="form-control border border-dark rounded" type="text" id="usrname" name="uname"
                                placeholder="Username">
                            <label class="form-label" for="usrname">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 col-6 form-floating mb-3" id="show_hide_password">
                            <input class="form-control border border-dark rounded" type="password" id="pwd"
                                name="password" placeholder="Password">
                            <label class="form-label" for="pwd">Password</label>
                        </div>
                        <div class="px-1 col-6 form-floating mb-3">

                            <input class="form-control border border-dark rounded" type="password" id="cfmpass"
                                name="cpass" placeholder="Confirm Password">
                            <label class="form-label" for="cfmpass">ConfirmPassword</label>
                        </div>

                        <button class="px-1 btn btn-primary" id="su" name="submit" type="submit">Register</button>
                    </div>
                </form>
            </section>
        </section>
    </section>
    <div class="pt-3">
        <?php require_once "footer.php";?>
    </div>
</body>

</html>