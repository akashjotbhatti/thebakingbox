<?php
// get the database connection
require_once "config.php";
//set the id
$id = $_POST["id"];
// if their is a user insert the data into the database
if($id)
{
	foreach ($_POST["restriction"] as $restrictionId) 
	{
		$sql = "INSERT INTO user_restrictions (user_id, restricition_id) VALUES ('".$id."','".$restrictionId."')";

		$successful = mysqli_query($mysqli, $sql);
	}
}
// redirect the user appropriately
if ($successful)
{
	header("location: welcome.php");
} else {
	header("location: welcome.php?error=1");
}
?>