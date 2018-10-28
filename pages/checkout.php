<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

$breadcrumbs[1]["name"] = "Shop";
$breadcrumbs[1]["url"] = "/shop/";
$breadcrumbs[2]["name"] = "Checkout";
$breadcrumbs[2]["url"] = "/checkout/";


//THIS GIVES US THE VARIABLE $DB
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "open_db.php");
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "db.php");

//THIS GIVES US THE VARIABLE $MEMBER
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "member.php");




if ($_COOKIE["my_cart"]) {
    $cart = unserialize($_COOKIE["my_cart"]);
    //only show items belonging to that person. 
    foreach ($cart as $key => $i) {

        if (isset($_REQUEST["member_id"])) {
            $this_mid = $_REQUEST["member_id"];
        } else {
            $this_mid = $member_data["member_id"];
        }

        if ($i["mid"] != $this_mid) {
            unset($cart[$key]);
        }
    }
} else {
    $cart = false;
}

if ($_POST["remove-item-submitted"] == 1) {
    $cart_again = unserialize($_COOKIE["my_cart"]);
    foreach ($cart_again as $key => $item) {
        if ($item["mid"] == $member_data["member_id"]) {
            if ($item["id"] == $_POST["pid"]) {
                unset($cart_again[$key]);
            }
        }
    }

    $cart_again = serialize($cart_again);
    setcookie("my_cart", $cart_again, strtotime('+200 days'), "/");
    $cart_again = unserialize($cart_again);


    header("Location: " . $_POST["this_url"]);
}

if ($_POST["buy"] == 1) {
    if ($_COOKIE["my_cart"]) {
        if ($db->insertOrders($member_data["member_id"], $cart)) {
            $cart_remove = unserialize($_COOKIE["my_cart"]);
            foreach ($cart as $key => $item) {
                if ($item["mid"] == $member_data["member_id"]) {
                    //order complete, get rid of those cookies. 
                    unset($cart_remove[$key]);
                }
            }
            $cart_remove = serialize($cart_remove);
            setcookie("my_cart", $cart_remove, strtotime('+200 days'), "/");
            header("Location: /orders/");
            exit();
        }
    }
}

/* Set custom page variables */
$this_page_settings = array(
    "meta_title" => "Checkout - INFOLAND",
    "meta_description" => ""
);

$this_page_settings["js_scripts"] = array("update-checkout-cart");
?>
<div class=" main-content">

    <div class="section">
        <h1>Checkout</h1>
    </div>
    <div id="checkout_list">
        <?php
        if ($cart) {
            $total_pice = 0;
            foreach ($cart as $item) {
                $product = $db->getProduct($item["id"]);
                if ($product->discount_price != "0.00") {
                    $price = $product->discount_price;
                } else {
                    $price = $product->price;
                }
                $total_pice = $total_pice + $price * $item["qty"];
                ?>
                <div class="row checkout-product-row-<?= $product->product_id ?>">
                    <div class="col-md-1">
                        <img class="product-image" src="/images/products/<?= $product->title_slugged ?>.jpg" alt="<?= $product->title_slugged ?>">
                    </div>
                    <div class="col-md-3">
                        <h3 class="remove-margin-top"><?= $product->title ?></h3>
                    </div>
                    <div class="col-md-2">
                        <h4 class="remove-margin-top"><small>NZD</small>$<?= $price ?></h4>
                    </div>
                    <div class="col-md-2">
                        <input style="width:75px" data-price="<?= $price ?>" data-pid="<?= $product->product_id ?>" data-mid="<?= $member_data["member_id"] ?>" data-original-quantity="<?= $item["qty"] ?>" name="quantity" min="1" max="<?= $product->stock ?>" size="2" value="<?= $item["qty"] ?>" type="number" />
                    </div>
                    <div class="col-md-2">
                        <h4 class="remove-margin-top"><small>NZD</small>$<span class="product-total-price" data-price="<?= number_format($price * $item["qty"], 2) ?>"><?= number_format($price * $item["qty"], 2) ?></span></h4>
                    </div>
                    <div class="col-md-2">
                        <form method="POST" action="">
                            <button  class="button-remove"><i class="fa fa-remove"></i></button>
                            <input type="hidden" name="remove-item-submitted" value="1" />
                            <input type="hidden" name="pid" value="<?= $product->product_id ?>" />
                            <input  type="hidden" name="this_url" value="<?= THIS_URL ?>" />
                        </form>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12"><Hr /></div>
                </div>
                <?php
            }
            ?>
            <div class="clearfix">


                <?php if ($member_data["member_id"] > 0) { ?>
                    <form method="POST" class="pull-right" action="/checkout/">
                        <input name="buy" value="1" type="hidden"/>
                        <button id="checkout_button" type="submit" class="primary-button">Buy</button>

                    </form>
                <?php } else { ?>
                    <a id="checkout_button" class="pull-right primary-button" href="/register/?checkout=1">Next</a>
                <?php } ?>
                <h2 style="margin-top:0;margin-right:20px" class="pull-right"><small>NZD</small>$<span id="grand_total"><?= number_format($total_pice, 2) ?></span></h2>
            </div>

        <?php } else { ?>
            <p>Your cart is empty.</p>
        <?php } ?>

    </div>



</div>