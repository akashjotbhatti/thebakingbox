<?php
include("libs/functions.php");
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order Form</title>
	<link rel="stylesheet" type="text/css" href="css/site.css">
</head>
<body>
	<?php
	$ordersActive = "active";
	include("includes/navigation.php");

	$determineAction = (isset($_GET["id"])) ? "Edit an order" : "Add a new order";

	

	$con = connect();

	if (isset($_GET["id"]))
	{
		$sql = "SELECT * FROM orders WHERE id='".$_GET["id"]."'";
		$results = mysqli_query($con, $sql);
		$orders = mysqli_fetch_assoc($results);
	}
	?>

	<h1><?=$determineAction?></h1>

	<form method="post" action="saveUser.php">
		<input type="hidden" name="id" value="<?=$orders['id']?>"/>

		<div class="fieldgroup">
			<label>Full Name:</label>
			<input type="text" name="full_name" value="<?=$orders['full_name']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Email:</label>
			<input type="text" name="email" value="<?=$orders['email']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Address:</label>
			<input type="text" name="address" value="<?=$orders['address']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>City:</label>
			<input type="text" name="city" value="<?=$orders['city']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Country:</label>
			<input type="text" name="country" value="<?=$orders['country']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Postal Code:</label>
			<input type="text" name="postal_code" value="<?=$orders['postal_code']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Name on Card:</label>
			<input type="text" name="name_on_card" value="<?=$orders['name_on_card']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Card Number:</label>
			<input type="text" name="card_no" value="<?=$orders['card_no']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Expiry Date:</label>
			<input type="text" name="expiry_date" value="<?=$orders['expiry_date']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Security Code:</label>
			<input type="text" name="security_code" value="<?=$orders['security_code']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Order Status:</label>
			<input type="text" name="order_status" value="<?=$orders['order_status']?>">
		</div><!-- .fieldgroup -->
		
		<div class="fieldgroup">
			<input id="save" type="submit" value="Save Change"/>
			<input id="reset" type="reset" value="Rest Change"/>
			<!-- cancel/go back button
				https://www.computerhope.com/issues/ch000317.htm -->
			<input id="cancel" type="button" value="Cancel" onclick="history.back()">
		</div><!-- .fieldgroup -->
	</form>
</body>
</html>