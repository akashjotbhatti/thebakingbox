<?php
include("libs/functions.php");
checkLogin();

$con = connect();
$id = $_POST["id"];
if($id)
{
	$sql = "UPDATE product_types SET name='".$_POST["name"]."'";
} else {
	$sql = "INSERT INTO product_types (name) VALUES ('".$_POST["name"]."')";
}

$successful = mysqli_query($con, $sql);
if ($successful)
{
	header("location: productTypes.php?successful=1");
} else {
	header("location: productTypes.php?error=1");
}
?>