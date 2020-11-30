<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect them to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php?action=welcome");
    exit;
}
 
// Include config file
require_once "register_login/config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if email exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $email, $password);
                    if($stmt->fetch()){
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: ../index.php?action=welcome");

                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>
<div class="content">
	<section class="login_part section_padding ">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
            <div class="login_part_text text-center">
              <div class="login_part_text_iner">
                <h2>New to our shop?</h2>
                <a href="index.php?action=register" class="btn_3" id="login_btn">Create an account</a>
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
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>