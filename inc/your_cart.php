<?php
if (isset($_REQUEST["member_id"])) {
    $this_mid = $_REQUEST["member_id"];
}else{
    $this_mid = $member_data["member_id"];
}
if ($_COOKIE["my_cart"]) {
    $cart = unserialize($_COOKIE["my_cart"]);
    //print_r($cart);
    //only show items belonging to that person. 
    foreach ($cart as $key => $i) {

        if ($i["mid"] != $this_mid) {
            unset($cart[$key]);
        }
    }
} else {
    $cart = false;
}

//print_r(unserialize($_COOKIE["my_cart"]));
?>

<div id="my_cart">
    <h4 class=" margin-bottom-5"><i class="fa fa-shopping-cart"></i> Your Cart</h4>
<?php
if ($cart) {
    $sum_items = 0;
    $sum_price = 0;
    foreach ($cart as $item) {
        $sum_price += $item["prc"] * $item["qty"];
        $sum_items +=$item["qty"];
    }
    ?>
        <p class="margin-bottom-20">You have <strong><?= $sum_items ?></strong> items which costs <strong>$<?= number_format($sum_price, 2) ?></strong>.</p>
        <a href="/checkout/" class="primary-button">Checkout</a>
        <?php
    } else {
        echo "<p>Your cart is empty</p>";
    }
    ?>

</div>