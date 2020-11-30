<?php
// start session
session_start();
// check if user is logged in, if not then redirect them to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// include db connection
require_once "config.php";
// get current user
$sql = "SELECT * FROM users WHERE id = $_SESSION[id]";
$results = mysqli_query($mysqli, $sql);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Baking Box</title>
    <link rel="stylesheet" type="text/css" href="../css/site.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="wrapper">
    <div class="page-header">
        <a href="../index.php"><img src="../img/logo.png" alt="The Baking Box's Logo"></a>
    </div>

    <div class="content">
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <a href="../index.php?action=pastOrders" class="btn_1" id="login_btn">Past Orders</a>
                                <a href="register_login/logout.php" class="btn_3" id="logout">Logout</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <h1>Your Profile</h1>
                        <?php
                        while($userFound = mysqli_fetch_assoc($results)) 
                        {
                        ?>   
                            <p><?=$userFound['full_name']?></p>
                            <p><?=$userFound['email']?></p>

                            <label>Dietary Restrictions:</label>
                            <?php
                            $sql = "SELECT * FROM restrictions";
                            $results = mysqli_query($mysqli, $sql);
                            while($restriction = mysqli_fetch_assoc($results)){
                            $checked = (isset($restrictionSelectedArray[$restriction["id"]])) ? "CHECKED" : "";
                            ?>
                                <div id="restriction"><input type="checkbox" name="restriction[]" <?=$checked?> value="<?=$restriction["id"]?>"> <?=$restriction["name"]?></div>
                            <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
            </div>
        </section>
    </div>
</div>
<script src="js/jquery-1.12.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/26cc814c09.js" crossorigin="anonymous"></script>
</body>
</html>