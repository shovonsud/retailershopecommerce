<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "db_connect.php";
if (isset($_SESSION['logged_in'])) {
    define('access', true);
    ?>
<!DOCTYPE html>

<head>
  <title>Management Control Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href='../../assets/style/style.css' rel='stylesheet'>
  <link rel="icon" type="image/png" href="../../assets/images/icon.png">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../../assets/js/app.js"></script>
</head>

<body class="">
  <header class="">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand " href="../management">
          <img src="../../assets/images/icon.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
          LIFE <i class="fab fa-internet-explorer fa-xs"></i> Shop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../management">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../management/users.php">Users</a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="../category">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../products">Items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../orders/order.php">Customer(Billing)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../orders/orderrec.php">Order Records</a>
            </li>
          </ul>
          <div class="d-flex flex-row-reverse text-end bg-warning text-dark rounded">
            <button type="button" class="btn btn-primary" title="Logout"
              onclick="window.location.href='../management/logout.php'"><i class="fas fa-sign-out-alt"></i></button>
            <h6 class="p-2">Welcome<?php echo "<br>" . $_SESSION['name']; ?></h6>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

  </script>
</body>

</html>
<?php
} else {
    header("Location:../management/login.php");
}

?>