<?php
include("libs/functions.php");

$con = connect();
$sql = "DELETE FROM product_types WHERE id='".$_GET["id"]."'";
$successful = mysqli_query($con, $sql);
if ($successful)
{
	header("location: productTypes.php?successful=1");
} else {
	header("location: productTypes.php?error=1");
}
?>