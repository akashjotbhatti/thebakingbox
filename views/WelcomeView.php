<?php
// start session
session_start();
 
// check if user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// include db connection
require_once "register_login/config.php";

// get the users information by id to display the data on the page
$sql = "SELECT * FROM users WHERE id = $_SESSION[id]";
$results = mysqli_query($mysqli, $sql);
?> 
<div class="content">
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <a href="index.php?action=pastOrders" class="btn_3" id="orders">Past Orders</a>
                            <a href="register_login/logout.php" class="btn_1" id="logout">Logout</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Your Profile</h3>
                            <?php
                            while($userFound = mysqli_fetch_assoc($results)) 
                            {
                            ?>   
                                <p><?=$userFound['full_name']?></p>
                                <p><?=$userFound['email']?></p>

                                <form method="post" action="register_login/editProfile.php">
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
                                    <input type="submit" name="submit" value="Save Profile" class="btn_3" id="profile">
                                </form>
                        </div>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>