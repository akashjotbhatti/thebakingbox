<?php
include("libs/functions.php");
checkLogin();

$con = connect();
$id = $_POST["id"];
if($id)
{
	$sql = "UPDATE orders SET full_name='".$_POST["full_name"]."', email='".$_POST["email"]."', address='".$_POST["address"]."', city='".$_POST["city"]."', country='".$_POST["country"]."', postal_code='".$_POST["postal_code"]."', name_on_card='".$_POST["name_on_card"]."', card_no='".$_POST["card_no"]."', expiry_date='".$_POST["expiry_date"]."', security_code='".$_POST["security_code"]."'";
} else {
	$sql = "INSERT INTO orders (full_name, email, address, city, country, postal_code, name_on_card, card_no, expiry_date, security_code) VALUES('".$_POST['full_name']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['city']."', '".$_POST['country']."', '".$_POST['postal_code']."', '".$_POST['name_on_card']."', '".$_POST['card_no']."', '".$_POST['expiry_date']."', '".$_POST['security_code']."')";
}

$successful = mysqli_query($con, $sql);
if ($successful)
{
	header("location: orders.php?successful=1");
} else {
	header("location: orders.php?error=1");
}

?>