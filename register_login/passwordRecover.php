<?php
// start session
session_start();
// db connection
require_once "config.php";
// user clicks sumbit
if(isset($_POST['submit'])) 
{
  $id = $_POST['id'];
  $result = mysqli_query($mysqli,"SELECT * FROM users where id='".$_POST['id']."'");
  $row = mysqli_fetch_assoc($result);
	$fetch_id=$row['id'];
	$email=$row['email'];
	$password=$row['password'];
	if($id==$fetch_id)
  {
		$to = $id;
    $subject = "Password";
    $txt = "Your password is : $password.";
    $headers = "From: thebakingbox@hotmail.com" . "\r\n" .
    "CC: somebodyelse@example.com";
    mail($to,$subject,$txt,$headers);
  }else{
  	echo 'invalid email';
  }
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/site.css">
</head>
<body>
<div class="wrapper">
  <div class="recover">
    <h2>Forgot your password? No worries, just insert your email to recover it!</h2>
    <form action="" method="post">
      <input type="text" name="email" placeholder="Email" id="email" />
      <input type="submit" name="submit" value="Submit" class="btn_3" id="recover" />
    </form>
  </div>
</div>
</body>
</html>