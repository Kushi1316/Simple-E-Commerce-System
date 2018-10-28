<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

$categories = $db->listCategories();

$cat_id = -1; //used to make categories in the sidebar inactive
//obtain product ID from URL
$product_id = explode("-", $url_variables[2]);
$product_id = $product_id[0];

//Get product data from DB
$product = $db->getProduct($product_id);

//Set breadcrumbs
$breadcrumbs[1]["name"] = "Shop";
$breadcrumbs[1]["url"] = "/shop/";
$breadcrumbs[2]["name"] = $product->category_title;
$breadcrumbs[2]["url"] = "/shop/category/" . $product->category_id . "-" . $product->category_title_slugged . "/";
$breadcrumbs[3]["name"] = $product->title;
$breadcrumbs[3]["url"] = "/shop/product/" . $product->product_id . "-" . $product->title_slugged . "/";

if($product->discount_price != "0.00"){
    $price = $product->discount_price;
}else{
    $price = $product->price;
}

/* Set custom page variables */
$page_title = $product->title . " - " . $product->category_title . " - INFOLAND";
$this_page_settings = array(
    "meta_title" => $page_title,
    "meta_description" => ""
);
$this_page_settings["js_scripts"] = array("jquery.validate.min", "registration-form", "product-grid-fixes","add-to-cart")
?>
<div class=" main-content">
    <div class="section">
        <div class="row">
            <aside class="col-md-3">
                <div class="thumbnail">
                    <img class="product-image" src="/images/products/<?= $product->title_slugged ?>.jpg" alt="<?= $product->title_slugged ?>">
                </div>
            </aside>
            <div class="col-md-6">
                <h1 class="remove-margin-top remove-margin-bottom"></i> <?= $product->title ?></h1>
                <p><small>Posted in <a href="/shop/category/<?= $product->category_id . "-" . $product->category_title_slugged ?>/"><?= $product->category_title ?></a>. Last updated <?= $product->last_updated ?>.</small></p>
                <p><?= $product->description ?></p>
                <h2 class="listing-price">
                    <strong>
                        <?php if ($product->discount_price != "0.00") { ?><s><?php } ?>
                            $<?= $product->price ?>
                            <?php if ($product->discount_price != "0.00") { ?></s>&nbsp;<?php
                                echo "<span class='discount-price'>$" . $product->discount_price . "</span>";
                            }
                            ?>
                    </strong> &nbsp; <small>(<?= $product->stock ?> in stock).</small>
                </h2>
                <form class="add-to-cart-form">
                    <label>Quantity</label>&nbsp;&nbsp;
                    <input style="width:75px" name="quantity" min="1" max="<?= $product->stock ?>" size="2" value="1" type="number" />&nbsp;&nbsp;
                    <button class="primary-button"  data-mid="<?=$member_data["member_id"]?>" data-pid="<?=$product->product_id?>" data-price="<?=$price?>">Add to Cart</button>
                    <div class="product-cart-message"></div>
                </form>
                
            </div>
              <aside class="col-md-3">
                <?php
                require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "shop_categories.php");
                require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "your_cart.php");
                require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "member_status.php");
                ?>
            </aside>
        </div>
    </div>
</div>