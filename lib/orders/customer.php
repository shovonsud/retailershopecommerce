<!DOCTYPE html>
<head>
    <title>Customer Panel || Buyout</title>
    <link rel="icon" type="image/png" href="../images/icon.png">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
<script type="text/javascript">
	function getitemdetails(){
		document.getElementById("availquant").value=document.getElementById("itemselect").value;
	}
</script>

    <div class="bodystart">
        <h1><i>Welcome</i></h1>
        <form method="POST" action="newcustorder.php">
            <label>Customer Name</label>
            <input type="text" name="customername"autofocus placeholder="Enter Customer Name" required>
            <label>Customer Address</label>
            <input type="text" name="customeraddr" placeholder="Enter Customer Address" required><br><br>
            <label>Customer Phone</label>
            <input type="text" name="customerphn" placeholder="Enter Phone no." required minlength="10" maxlength="10" size="10" pattern="\d{10}"><br><br><br>
            <label>Choose Item</label>
            <?php
require_once "../include/db_connect.php";
$sql = "SELECT a.*,b.* FROM product a,category b WHERE a.cat_id=b.id ORDER BY a.item_id ASC";
$result = mysqli_query($db_conn, $sql);
echo "<select name='itemsel' id='itemselect' style='cursor:grab' required onchange='getitemdetails()'>";
echo "<option value=''>Select</option>";
while ($row = $result->fetch_assoc()) {
    if ($row['item_status'] == 1 && $row['status'] == 1) {
        echo "<option value='" . $row['item_id'] . "'>" . $row['item_name'] . '  -->Avail. Quantity:' . $row['quantity'] . '  -->Rate:₹' . $row['unit_price'] . "</option>";
    }

}
echo "</select>";
?>
            <label>Item ID</label>
            <input type="number" id="availquant" readonly placeholder="Select Item" style="cursor:no-drop"><br>
            <div><br><label>Required Quantity</label>
            <input type="number" name="reqquant" required pattern="\d" min="1" placeholder="Enter req. quantity">
            <div>
            <button class="submitnewcat" type="submit" name="subbmit" value="Submit">Confirm Order</button></div></div>
        </form>
    </div>
    <div style="text-align:center;">
        <?php include 'footer.php';?>
    </div>
</body>
</html>
