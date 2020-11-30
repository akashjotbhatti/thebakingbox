<?php
include("libs/functions.php");
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/site.css">
</head>
<body>
	<?php
	$dashboardActive = "active";
	include("includes/navigation.php");
	?>

	<div class="dash">
		<h1>Welcome! Choose a section to update.</h1>
		<div class="product_types">
			<a href="productTypes.php">Product Types</a>
		</div><!-- .products_types -->

		<div class="products">
			<a href="products.php">Products</a>
		</div><!-- .products -->

		<div class="users">
			<a href="users.php">Users</a>
		</div><!-- .users -->

		<div class="orders">
			<a href="orders.php">Orders</a>
		</div><!-- .orders -->
	</div><!-- .dash -->
</body>
</html>