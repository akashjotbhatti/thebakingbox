<?php
include("libs/functions.php");

$con = connect();
$sql = "DELETE FROM orders WHERE id='".$_GET["id"]."'";
$successful = mysqli_query($con, $sql);
if ($successful)
{
	header("location: orders.php?successful=1");
} else {
	header("location: orders.php?error=1");
}
?>