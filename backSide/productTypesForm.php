<?php
include("libs/functions.php");
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Types</title>
	<link rel="stylesheet" type="text/css" href="css/site.css">
</head>
<body>
	<?php
	$productTypesActive = "active";
	include("includes/navigation.php");

	$determineAction = (isset($_GET["id"])) ? "Edit a product type" : "Add new product type";

	$product_types['id'] = "";
	$product_types['name'] = "";

	$con = connect();

	if (isset($_GET["id"]))
	{
		$sql = "SELECT * FROM product_types WHERE id='".$_GET["id"]."'";
		$results = mysqli_query($con, $sql);

		if ($results) {
			$product_types = mysqli_fetch_assoc($results);
		}
	}
	?>

	<h1><?=$determineAction?></h1>

	<form method="post" action="saveProductTypes.php">
		<input type="hidden" name="id" value="<?=$product_types['id']?>"/>

		<div class="fieldgroup">
			<label>Name:</label>
			<input type="text" name="name" value="<?=$product_types['name']?>">
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