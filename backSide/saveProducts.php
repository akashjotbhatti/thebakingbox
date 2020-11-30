<?php
include("libs/functions.php");
checkLogin();

$con = connect();
$id = $_POST["id"];
if($id)
{
	$sql = "UPDATE products SET name='".$_POST["name"]."', price='".$_POST["price"]."', image='".$_POST["image"]."', description='".$_POST["description"]."', product_type_id='".$_POST["product_type_id"]."'";
} else {
	$sql = "INSERT INTO products (name, price, image, description, product_type_id) VALUES ('".$_POST["name"]."','".$_POST["price"]."', '".$_POST["image"]."', '".$_POST["description"]."', '".$_POST["product_type_id"]."')";
}

$successful = mysqli_query($con, $sql);
if ($successful)
{
	header("location: products.php?successful=1");
} else {
	header("location: products.php?error=1");
}

?>