<?php 
include("libs/cartConnection.php");
?>
<h3>Order Details</h3>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th id="fourty">Item Name</th>
            <th id="ten">Quantity</th>
            <th id="twenty">Price</th>
            <th id="fifteen">Total</th>
            <th id="five">Action</th>
        </tr>
        <?php
        if(!empty($_SESSION["shopping_cart"])) 
        {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
            ?>
            <tr>
                <td><?php echo $values["item_name"]; ?></td>
                <td><?php echo $values["item_quantity"]; ?></td>
                <td>$ <?php echo $values["item_price"]; ?></td>
                <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
            </tr>
            <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
            ?>
            <tr>
                <td colspan="3" class="right">Total</td>
                <td class="right">$ <?php echo number_format($total, 2); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<div>
    <a href="index.php?action=products" class="btn_3">Continue Shopping</a>
    <a href="register_login/login.php" class="btn_1">Checkout</a>
</div>
