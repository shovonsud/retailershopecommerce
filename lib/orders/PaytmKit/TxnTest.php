<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
if (!isset($_GET['id']) || !isset($_GET['carttotal'])) {
    exit(0);
}

$id = base64_decode($_GET['id']);
$carttotal = base64_decode($_GET['carttotal']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Merchant Check Out Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="GENERATOR" content="Evrsoft First Page">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container-fluid">
	<section class="row justify-content-center">
		<h1 class="text-center p-4" style="background-color:#B6C867"><i>Payment Gateway</i></h1>
		<section class="p-4 col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-4 rounded"
			style="background-color:#DBE6FD">
			<form method="post" action="pgRedirect.php" name="confirmtran">
				<div class="row">
					<div class="px-1 col-12  mb-3">
						<label>ORDER_ID::*</label>
						<input class="form-control border border-dark rounded" id="ORDER_ID" name="ORDER_ID"
							value="<?php echo $id ?>" required readonly />
					</div>
				</div>
				<div class="row d-none">
					<div class="px-1 col-12  mb-3">
						<label>INDUSTRY_TYPE_ID ::*</label>
						<input class="form-control border border-dark rounded" id="INDUSTRY_TYPE_ID"
							name="INDUSTRY_TYPE_ID" value="Retail" required readonly />
					</div>
				</div>
				<div class="row d-none">
					<div class="px-1 col-12  mb-3">
						<label>Channel ::*</label>
						<input class="form-control border border-dark rounded" id="CHANNEL_ID" name="CHANNEL_ID"
							value="WEB" required readonly />
					</div>
				</div>
				<div class="row">
					<div class="px-1 col-12  mb-3">
						<label>txnAmount*</label>
						<input class="form-control border border-dark rounded" title="TXN_AMOUNT" type="text"
							name="TXN_AMOUNT" value=<?php echo $carttotal; ?> required readonly />
					</div>
				</div>
				<button class="btn btn-primary" value="CheckOut" type="submit" onclick="">Proceed</button>
			</form>
		</section>
	</section>
	<script type="text/javascript">
		document.confirmtran.submit();
		</script>
</body>

</html>