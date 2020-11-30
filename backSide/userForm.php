<?php
include("libs/functions.php");
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Form</title>
	<link rel="stylesheet" type="text/css" href="css/site.css">
</head>
<body>
	<?php
	$userActive = "active";
	include("includes/navigation.php");

	$determineAction = (isset($_GET["id"])) ? "Edit a user" : "Add a new user";

	$admin['id'] = "";
	$admin['username'] = "";
	$admin['password'] = "";

	$con = connect();

	if (isset($_GET["id"]))
	{
		$sql = "SELECT * FROM admin WHERE id='".$_GET["id"]."'";
		$results = mysqli_query($con, $sql);
		$admin = mysqli_fetch_assoc($results);
	}
	?>

	<h1><?=$determineAction?></h1>

	<form method="post" action="saveUser.php">
		<input type="hidden" name="id" value="<?=$admin['id']?>"/>

		<div class="fieldgroup">
			<label>Username:</label>
			<input type="text" name="username" value="<?=$admin['username']?>">
		</div><!-- .fieldgroup -->

		<div class="fieldgroup">
			<label>Password:</label>
			<input type="text" name="password" value="<?=$admin['password']?>">
		</div><!-- .fieldgroup -->
		
		<div class="fieldgroup">
			<input id="save" type="submit" value="Save Change"/>
			<input id="reset" type="reset" value="Rest Change"/>
			<!-- cancel/go back button
				https://www.computerhope.com/issues/ch000317.htm -->
			<input id="cancel" type="button" value="Cancel" onclick="history.back()">
		</div><!-- .fieldgroup -->
	</form>
</body>
</html>