<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

$cat_id = 0;//used to make the all category show up as active 


if(isset($_GET["sort"])){
    $sort = $_GET["sort"];
}else{
    $sort = "last_update";
}

//product_id,title,sku,stock,price,discount_price,description,category_id,last_update
$products = $db->ProductListing(null,$sort);
$categories = $db->listCategories();

$breadcrumbs[1]["name"] = "Shop";
$breadcrumbs[1]["url"] = "/shop/";

/* Set custom page variables */
$this_page_settings = array(
    "meta_title" => "INFOLAND Shop",
    "meta_description" => "Welcome to Our Shop"
);
$this_page_settings["js_scripts"] = array("jquery.validate.min", "registration-form", "product-grid-fixes","add-to-cart")
?>
<div class=" main-content">
    <div class="section">
        <div class="row">
            <aside class="col-md-3">
                <?php
                require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "shop_categories.php");
                require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "your_cart.php");
                require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "member_status.php");
                ?>
            </aside>
            <div class="col-md-9">
                <div class="section remove-padding-top">
                    <h1 class="remove-margin-top"><i class="fa fa-shopping-cart"></i> INFOLAND Shop</h1>
                </div>
                <?php
                require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "product_listing.php");
                ?>
            </div>
        </div>
    </div>
</div>