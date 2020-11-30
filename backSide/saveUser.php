<?php
include("libs/functions.php");
checkLogin();

$con = connect();
$id = $_POST["id"];
if($id)
{
	$sql = "UPDATE admin SET username='".$_POST["username"]."', password='".$_POST["password"]."'";
} else {
	$sql = "INSERT INTO admin (username, password) VALUES ('".$_POST["username"]."','".$_POST["password"]."')";
}

$successful = mysqli_query($con, $sql);
if ($successful)
{
	header("location: users.php?successful=1");
} else {
	header("location: users.php?error=1");
}

?>