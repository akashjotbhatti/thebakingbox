<?php
// start session
session_start();

// check if user is logged in, if not then redirect them to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// db connection
require_once "register_login/config.php";

// select the current users orders
$sql = "SELECT * FROM product_orders LEFT JOIN products on products.id = product_orders.product_id WHERE user_id = $_SESSION[id]";

// save the connection and statement to a variable
$result = mysqli_query($mysqli, $sql);

?> 
<div class="content">
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Past Orders</h3>
                            <?php
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                                    ?>
                                    <p><?=$row["name"];?></p>
                                    <?php
                                }
                                ?>
                                <a href="index.php?action=cart" class="btn_3">Order Now</a>
                            <?php
                            } else {
                                echo "<p>Your orders will be here</p>";
                                echo "<a href='index.php?action=products' class='btn_1'>Shop Now</a>";
                            }
                           ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>