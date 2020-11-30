<?php
// db connect
require_once "config.php";
// define variables with empty values
$full_name = $email = $password = $confirm_password = "";
$full_name_err = $email_err = $password_err = $confirm_password_err = "";
// process form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  // validate name
  if(empty(trim($_POST["full_name"])))
  {
    // error if missing
    $full_name_err = "Please enter your full name.";
  }else{
    // get the current user
    $sql = "SELECT id FROM users WHERE email = ?";    
    if($stmt = $mysqli->prepare($sql))
    {
      // bind variables to the sql as parameters
      $stmt->bind_param("s", $param_full_name);      
      // set parameters
      $param_full_name = trim($_POST["full_name"]);      
      // attempt to execute the prepared statement
      if($stmt->execute())
      {
        // store result
        $stmt->store_result(); 
        // if there are errors       
        if($stmt->num_rows == 1)
        {
          // show name error
          $full_name_err = "This name is already taken.";
        }else{
          // trim whitespace
          $full_name = trim($_POST["full_name"]);
        }
      }else{
        // if theres another error alert user
        echo "Something went wrong. Please try again later.";
      }
      // close statement
      $stmt->close();
    }
  }
 
  // validate email
  if(empty(trim($_POST["email"]))){
    // email error
    $email_err = "Please enter a email.";
  }else{
    // get current user
    $sql = "SELECT id FROM users WHERE email = ?";
    if($stmt = $mysqli->prepare($sql))
    {
      // bind variables to the sql as parameters
      $stmt->bind_param("s", $param_email);
      // set parameters
      $param_email = trim($_POST["email"]);
      // attempt to execute the prepared statement
      if($stmt->execute())
      {
        // store result
        $stmt->store_result();
        // if errors
        if($stmt->num_rows == 1)
        {
          // show email error
          $email_err = "This email is already taken.";
        }else{
          // trim whitespace
          $email = trim($_POST["email"]);
        }
      }else{
        // show if different error
        echo "Oops! Something went wrong. Please try again later.";
      }
      // Close statement
      $stmt->close();
    }
  }
  
  // Validate password
  if(empty(trim($_POST["password"])))
  {
    // password error
    $password_err = "Please enter a password.";
    // password must be greater than 6     
  }elseif(strlen(trim($_POST["password"])) < 6)
  {
    // password error
    $password_err = "Password must have atleast 6 characters.";
  }else{
    // trim whitespace
    $password = trim($_POST["password"]);
  }  
  // Validate confirm password
  if(empty(trim($_POST["confirm_password"])))
  {
    // ensure user filled in the field
    $confirm_password_err = "Please confirm password.";     
  }else{
    // trim whitespace
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($password_err) && ($password != $confirm_password))
    {
      // passwords dont match
      $confirm_password_err = "Password did not match.";
    }
  }  
  // check input errors before inserting in database
  if(empty($full_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err))
  {  
    $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
    if($stmt = $mysqli->prepare($sql))
    {
      // bind variables to the sql as parameters
      $stmt->bind_param("sss", $param_full_name, $param_email, $param_password);
      // set parameters
      $param_full_name = $full_name;
      $param_email = $email;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
      // attempt to execute the prepared statement
      if($stmt->execute())
      {
        // redirect to login page
          header("location: login.php");
      }else{
        echo "Something went wrong. Please try again later.";
      }
      // Close statement
      $stmt->close();
    }
  }  
  // Close connection
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
	<div class="logo"><a href="../index.php"><img src="../img/logo.png"></a></div>
  <section class="login_part section_padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="login_part_text text-center">
            <div class="login_part_text_iner">
              <h2>Create an account & start ordering as many treats as you want!</h2>
            </div>
          </div>
        </div>
            
        <div class="col-lg-6 col-md-6">
          <div class="login_part_form">
            <div class="login_part_form_iner">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($full_name_err)) ? 'has-error' : ''; ?>">
                  <label>Full Name</label>
                  <input type="text" name="full_name" class="form-control" value="<?php echo $full_name; ?>">
                  <span class="help-block"><?php echo $full_name_err; ?></span>
                </div>   
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                  <span class="help-block"><?php echo $email_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                  <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                  <label>Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                  <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="col-md-12 form-group">
                  <input type="submit" class="btn_3" value="Submit">
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