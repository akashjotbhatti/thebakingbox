<?php 
// start session
session_start();
// connect to the db
$con = DB::connect();
// if add to cart is clicked add the item to the shopping cart
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		// create a variable to hold the shopping cart details
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		// check if the item is in the above variable
		if(!in_array($_GET["id"], $item_array_id))
		{
			// count the items
			$count = count($_SESSION["shopping_cart"]);
			// create an item array
			$item_array = array(
				'item_id' => $_GET["id"],
				'item_name'	=> $_POST["hidden_name"],
				'item_price' =>	$_POST["hidden_price"],
				'item_quantity' => $_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		} else {
			echo '<script>alert("Item Already Added")</script>'; // if item is already in cart tell user
		}
	} else {
		// add items
		$item_array = array(
			'item_id' => $_GET["id"],
			'item_name' => $_POST["hidden_name"],
			'item_price' =>	$_POST["hidden_price"],
			'item_quantity' => $_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
// if user clickes the remove from cart button, remove the item from the cart
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]); // remove the item from the session
				echo '<script>alert("Item removed from cart")</script>'; // tell user item has been removed
			}
		}
	}
}
?>