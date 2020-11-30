<?php
include("libs/functions.php");

$successful = processLogin($_POST["username"], $_POST["password"]);
if ($successful)
{
	header("location: dashboard.php");
} else {
	header("location: index.php?error=1");
}
?>