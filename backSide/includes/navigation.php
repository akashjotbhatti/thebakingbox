<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/site.css">
</head>
<body>

<!-- show which page user is on using active -->
<?php
	$dashboardActive = (isset($dashboardActive)) ? $dashboardActive : "";
	$productTypesActive = (isset($productTypesActive)) ? $productTypesActive : "";
	$productsActive = (isset($productsActive)) ? $productsActive : "";
	$usersActive = (isset($usersActive)) ? $usersActive : "";
	$ordersActive = (isset($ordersActive)) ? $ordersActive : "";
?>
<!-- need a home page and pages related to navigation links, pages, and users --> 
<div class="navigation">
	<a href="dashboard.php" class="<?=$dashboardActive?>">Dashboard</a>
	<a href="productTypes.php" class="<?=$productTypesActive?>">Product Types</a>
	<a href="products.php" class="<?=$productsActive?>">Products</a>
	<a href="users.php" class="<?=$usersActive?>">Users</a>
	<a href="orders.php" class="<?=$ordersActive?>">Orders</a>
</div>

<!-- user should be able to logout -->
<div class="logout">
	<a href="index.php">Log Out</a>
</div>
</body>
</html>