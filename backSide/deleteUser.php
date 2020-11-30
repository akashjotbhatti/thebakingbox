<?php
include("libs/functions.php");

$con = connect();
$sql = "DELETE FROM admin WHERE id='".$_GET["id"]."'";
$successful = mysqli_query($con, $sql);
if ($successful)
{
	header("location: users.php?successful=1");
} else {
	header("location: users.php?error=1");
}
?>