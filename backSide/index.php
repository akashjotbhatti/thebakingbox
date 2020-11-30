<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<script src="https://kit.fontawesome.com/26cc814c09.js" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/site.css">
</head>
<body id="login">
<!-- I saw a tutorial from Julio Codes on this form and decided to try it-->
	<!-- https://www.youtube.com/watch?v=UhvVsc2sM4s -->

<!-- create a login form with an action and method of post -->
<div class="wrapper">
	<div class="form-container">
		<span class="form-heading">Login</span>
		<form action="processLogin.php" method="post" id="loginForm">
			
			<div class="input-group">
				<i class="fas fa-user"></i>
				<input type="text" name="username" placeholder="Username">
				<span class="bar"></span>
			</div>

			<div class="input-group">
				<i class="fas fa-lock"></i>
				<input type="password" name="password" placeholder="Password">
				<span class="bar"></span>
			</div>

			<div class="input-group">
				<button><i class="fab fa-telegram-plane"></i></button>
			</div>
		</form>
	</div>
</div>
</body>
</html>