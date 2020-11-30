<?php
include("libs/functions.php");
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Form</title>
	<link rel="stylesheet" type="text/css" href="css/site.css">
</head>
<body>
	<?php
	//include("libs/function.php");
	$productActive = "active";
	include("includes/navigation.php");

	$determineAction = (isset($_GET["id"])) ? "Edit a product" : "Add a new product";

	$product['id'] = "";
	$product['name'] = "";
	$product['price'] = "";
	$product['image'] = "";
	$product['description'] = "";
	$product['product_type_id'] = "";
	$product['quantity'] = "";

	$con = connect();

	if (isset($_GET["id"]))
	{
		$sql = "SELECT * FROM products WHERE id='".$_GET["id"]."'";
		$results = mysqli_query($con, $sql);
		$product = mysqli_fetch_assoc($results);
	}
	?>

	<h1><?=$determineAction?></h1>

	<form method="post" action="saveProducts.php">
		<input type="hidden" name="id" value="<?=$product['id']?>"/>

		<div class="fieldgroup">
			<label>Name:</label>
			<input type="text" name="name" value="<?=$product['name']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Price:</label>
			<input type="text" name="price" value="<?=$product['price']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Image:</label>
			<input type="text" name="image" value="<?=$product['image']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Description:</label>
			<textarea name="description"><?=$product['description']?></textarea>
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Product Type Id:</label>
			<input type="text" name="product_type_id" value="<?=$product['product_type_id']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Quantity:</label>
			<input type="text" name="quantity" value="<?=$product['quantity']?>">
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