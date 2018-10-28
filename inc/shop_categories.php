<?php
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}
?>
<h4 class="remove-margin-top margin-bottom-5"><i class="fa fa-bars"></i> Categories</h4>
<ul class="sidebar-nav nav nav-pills nav-stacked"  role="tablist">

    <li class="<?php if($cat_id==0){echo"active";}?>">
            <a href="/shop/">All (<?=$categories["total_products_count"]?>)</a>
        </li>
    <?php
    foreach ($categories["data"] as $cat) {
        ?>
        <li class="<?php if($cat_id==$cat["category_id"]){echo"active";}?>">
            <a href="/shop/category/<?=$cat["category_id"]."-".$cat["slugged_title"]?>/"><?=$cat["category_title"]?> (<?=$cat["count_products"]?>)</a>
        </li>

    <?php } ?>
</ul>

