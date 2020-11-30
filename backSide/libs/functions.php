<?php
// create a session for GET and POST variables
session_start();

// create a function connecting to database
function connect()
{
	return mysqli_connect("localhost", "akashjot_baking", "hWeut8XKW0c", "akashjot_thebakingbox");
}

// create a function that checks to see if the username and password entered match a record in the database
function processLogin($username, $password)
{
	$sql = "SELECT * FROM admin WHERE username='".$_POST["username"]."' AND password='".$password."'";
	$results = mysqli_query(connect(), $sql);
	$userFound = mysqli_fetch_assoc($results);

	if($userFound)
	{
		$_SESSION["nUserID"] = $userFound["id"];
		return true;
	} else {
		return false;
	}
}

// check to see if the user is logged in before allowing them to access pages
function checkLogin()
{
	if (isset($_SESSION["nUserID"]))
	{
		return true;
	} else {
		header("location: index.php?error=1");
	}
}