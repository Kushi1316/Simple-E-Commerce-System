<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}



$categories = $db->listCategories();

$cat_id = explode("-", $url_variables[2]);
$cat_id = $cat_id[0];

if(isset($_GET["sort"])){
    $sort = $_GET["sort"];
}else{
    $sort = "last_update";
}

$products = $db->ProductListing($cat_id,$sort);

$category = $db->getCategory($cat_id);
$page_title = $category->category_title . " - Shop - INFOLAND";


$breadcrumbs[1]["name"] = "Shop";
$breadcrumbs[1]["url"] = "/shop/";
$breadcrumbs[2]["name"] = $category->category_title;
$breadcrumbs[2]["url"] = "/shop/category/" . $category->category_id . "-" . $category->title_slugged . "/";



/* Set custom page variables */
$this_page_settings = array(
    "meta_title" => $page_title,
    "meta_description" => ""
);
$this_page_settings["js_scripts"] = array("jquery.validate.min", "registration-form", "product-grid-fixes", "add-to-cart");
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
                    <h1 class="remove-margin-top"><?= $category->category_title ?></h1>
                </div>
                <?php
                require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "product_listing.php");
                ?>
            </div>




        </div>

    </div>
</div>