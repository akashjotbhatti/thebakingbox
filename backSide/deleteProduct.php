<?php
$con = connect();
$sql = "DELETE FROM products WHERE id='".$_GET["id"]."'";
$successful = mysqli_query($con, $sql);
if ($successful)
{
	header("location: products.php?successful=1");
} else {
	header("location: products.php?error=1");
}
?>