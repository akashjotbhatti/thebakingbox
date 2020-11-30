<?php
include("libs/functions.php");
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="css/site.css">
	<script src="https://kit.fontawesome.com/26cc814c09.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
	<?php
	$productsActive = "active";
	include("includes/navigation.php");

	if (isset($_GET["successful"]))
	{
		echo '<div class="successful"><i class="fas fa-check"></i>Task Completed Successfully</div>';
	} else if (isset($_GET["error"]))
	{
		echo '<div class="error"><i class="fas fa-exclamation"></i>Task Not Completed</div>';
	}

	$con = connect();
	$sql = "SELECT * FROM products";
	$results = mysqli_query($con, $sql);
	?>
	<h1 class="title">Products</h1>
	<a href="productsForm.php" class="addBtn"><i class="fas fa-plus"></i>Add New Product</a>
	<div class="list">
		<div class="header">
			<div class="name">Product</div><!-- .name -->
			<div class="update">Update</div><!-- .update -->
			<div class="delete">Delete</div><!-- .delete -->
		</div><!-- .header -->
	<?php
	while($bakingcms = mysqli_fetch_assoc($results))
	{
	?>
		<div class="details">
			<div class="detail">
				<h2><?=$bakingcms["name"]?></h2>
				<div class="editBtn">
				<a href="productsForm.php?id=<?=$bakingcms["id"]?>"><i class="fas fa-edit"></i></a>
			</div><!-- .detail -->

			<div class="deleteBtn">
				<a href="deleteProduct.php?id=<?=$bakingcms["id"]?>"><i class="fas fa-trash"></i></a>
			</div><!-- .deleteBtn -->
		</div><!-- .details -->
	<?php
	}
	?>
	</div><!-- .list -->
<script>
	// need to be able to delete a field and confirm before action is done 
	// get the delete button 
	var deleteField = document.getElementsByClassName("deleteBtn");
	for(var i=0; i<deleteField.length; i++)
	{
		// when user clicks delete button, confirm before deleting 
		deleteField[i].addEventListener("click", function(action)
		{
			var affirmDelete = confirm("Would you like to delete this field?");

			// if user clicks cancel, doesn't want to delete, prevent deleting from happening
			if (!affirmDelete)
			{
				action.preventDefault();
			}
		})
	}
</script>
</body>
</html>