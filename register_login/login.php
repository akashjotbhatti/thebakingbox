<?php
// start session
session_start();
// check if the user is already logged in, if yes then redirect them to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
  header("location: ../index.php?action=welcome");
  exit;
}
// db connection
require_once "config.php"; 
// define variables and give them empty values
$email = $password = "";
$email_err = $password_err = "";
// proces form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  // check if email is empty
  if(empty(trim($_POST["email"])))
  {
    // show error if email is missing
    $email_err = "Please enter email.";
  }else{
    // trim whitespace from email
    $email = trim($_POST["email"]);
  }
  // check if password is empty
  if(empty(trim($_POST["password"])))
  {
    // show error is missing
    $password_err = "Please enter your password.";
  }else{
    // trim whitespace
    $password = trim($_POST["password"]);
  }
  
  // validate details
  if(empty($email_err) && empty($password_err))
  {
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    if($stmt = $mysqli->prepare($sql))
    {
      // bind variables to the sql as parameters
      $stmt->bind_param("s", $param_email);      
      // set parameters
      $param_email = $email;      
      // attempt to execute the prepared statement
      if($stmt->execute())
      {
        // store result
        $stmt->store_result();          
        // check if email exists, if yes then verify password
        if($stmt->num_rows == 1)
        {                    
        // bind result variables
          $stmt->bind_result($id, $email, $password);
          if($stmt->fetch())
          { 
            // store data in session
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $email;                                              
            // redirect user to welcome page
            header("location: ../index.php?action=welcome");
          }
        }else{
        // display an error if username doesn't exist
        $email_err = "No account found with that email.";
        } 
      } else {
      // display an error if something else goes wrong
      echo "Oops! Something went wrong. Please try again later.";
      }
      // close statement
      $stmt->close();
    }
  }
  // close connection
  $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/site.css">
</head>
<body>
<div class="wrapper">
	<div class="content">
		<section class="login_part section_padding ">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6">
            <div class="login_part_text text-center">
              <div class="login_part_text_iner">
                <h2>New to our shop?</h2>
                <a href="register.php" class="btn_3" id="login_btn">Create an account</a>
              </div>
            </div>
          </div>
            
          <div class="col-lg-6 col-md-6">
            <div class="login_part_form">
              <div class="login_part_form_iner">
                <h3>Welcome back! <br> Please sign in now</h3>
                <form class="row contact_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="col-md-12 form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                    <span class="help-block"><?php echo $email_err; ?></span>
                  </div>    
                  <div class="col-md-12 form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                  </div>
                  <div class="col-md-12 form-group">
                    <input type="submit" class="btn_3" value="Login">
                    <a href="../register_login/passwordRecover.php">Forgot Password</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>
 
