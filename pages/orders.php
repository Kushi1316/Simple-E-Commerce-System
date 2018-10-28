<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

$breadcrumbs[1]["name"] = "Shop";
$breadcrumbs[1]["url"] = "/shop/";
$breadcrumbs[2]["name"] = "Orders";
$breadcrumbs[2]["url"] = "/orders/";

//THIS GIVES US THE VARIABLE $DB
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "open_db.php");
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "db.php");

//THIS GIVES US THE VARIABLE $MEMBER
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "member.php");

$orders = $db->getMyOrders($member_data["member_id"]);

/* Set custom page variables */
$this_page_settings = array(
    "meta_title" => "Orders - INFOLAND",
    "meta_description" => ""
);
?>
<div class=" main-content">
    <div class="section">
        <h1>My Orders</h1>
    </div>
    <?php
    if ($member_data["member_id"] > 0) {
        if (!$orders) {
            echo "<p>No orders...yet!</p>";
        } else {
            foreach ($orders as $order) {
                ?>
                <div class="product-panel margin-bottom-20 orders-panel">
                    <h2 class="remove-margin-top margin-bottom-20"><?=$order["order_date"]?></h2>
                    <?php
                    $last = count($order["order_order"]);
                    $i = 1;
                    foreach ($order["order_order"] as $p) {
                        ?>
                        <div class="row">
                            <div class="col-md-1">
                                <img  src="/images/products/<?= $p["product_name_slugged"] ?>.jpg" alt="<?= $p["product_name"] ?>">
                            </div>
                            <div class="col-md-3">
                                <h3 class="remove-margin-top"><?= $p["product_name"] ?></h3>
                            </div>
                            <div class="col-md-2">
                                <h4 class="remove-margin-top"><small>NZD</small>$<?= $p["price"] ?></h4>
                            </div>
                            <div class="col-md-2">
                                <h4 class="remove-margin-top"><small>x</small><?= $p["quantity"] ?></h4>
                            </div>
                            <div class="col-md-2">
                                <h4 class="remove-margin-top"><small>NZD</small>$<?= number_format($p["price"] * $p["quantity"], 2) ?></h4>
                            </div>
                        </div>
                        <?php
                        if ($last != $i) {
                            echo "<Hr />";
                        }
                        $i++;
                    }
                    ?>
                </div>
                <?php
            }
        }
    } else {
        ?>
        <p>Guests shouldn't be here.</p>
        <?php
    }
    ?>
</div>