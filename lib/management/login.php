<?php
require_once "db_connect.php";
$sql = "SELECT * FROM user";
$result = mysqli_query($db_conn, $sql);
if (mysqli_num_rows($result) === 0) {
    header("Location:register.php");}
if (isset($_SESSION['id'])) {
    header("Location:../management");}

?>
<!DOCTYPE html>

<head>
	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
		integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="image/png" href="../../assets/images/icon.png">
	<link href='../../assets/style/style.css' rel='stylesheet'>
</head>

<body style="background-color:#0A1931">
	<section class="container-fluid">
		<section class="row justify-content-center mt-5" style="padding-top:15%">
			<section class="col-12 col-sm-9 col-md-8 col-lg-6 col-xl-5 col-xxl-4">

				<form class="py-5 px-4 border border-dark rounded bg-light" action="validatelogin.php" method="POST">
					<h2 class="bg-info p-3 rounded">Management Login</h2>
					<div class="pt-4">
						<?php if (isset($_GET['error'])) {?>
						<div class="alert alert-danger" role="alert"><?php echo $_GET['error']; ?></div>
						<?php }?>
						<div class="mb-3 input-group pt-3">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
							<input type="text" class="form-control border border-dark rounded" name="uname"
								id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username"
								autofocus>
						</div>
						<div class="mb-3 input-group pt-3 pb-3">
							<span class="input-group-text"><i class="fas fa-lock"></i></span>
							</label>
							<input type="password" class="form-control border border-dark rounded" name="password"
								id="exampleInputPassword1" placeholder="Enter password">
						</div>
						<button type="submit" class="btn btn-primary">Submit <i class="fas fa-sign-in-alt"></i></button>
					</div>
				</form>
			</section>
		</section>
	</section>
	<?php require_once "footer.php";?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
</body>

</html>