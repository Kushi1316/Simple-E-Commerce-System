<?php
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

$counter = 0;
?>
<!--
<form id="sort_form" class="clearfix" method="get">
    <div class="pull-right">
        <label class="pull-left" style="line-height: 35px">Sort by</label>
        <select name="sort" class="pull-left" style="width: 100px;margin-left: 10px">
            <option <?php if($sort=="last_update"){echo "selected='selected'";}?> value="last_update">Last Updated</option>
            <option <?php if($sort=="stock"){echo "selected='selected'";}?> value="stock">Stock</option>
            <option <?php if($sort=="price,discount_price"){echo "selected='selected'";}?> value="price,discount_price">Price</option>
            <option <?php if($sort=="title"){echo "selected='selected'";}?> value="title">Name</option>
        </select>
    </div>
</form>-->

<div class="row margin-bottom-20 product-row">
    <?php
    foreach ($products as $product) {


        if ($product["discount_price"] != "0.00") {
            $price = $product["discount_price"];
        } else {

            $price = $product["price"];
        }
        ?>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="product-panel ">
                <div class="product-panel-body">
                    <a class="thumbnail" href="/shop/product/<?= $product["product_id"] . "-" . $product["title_slugged"] ?>">
                        <div class="thumb-inner">
                            <img class="product-image" src="/images/products/<?= $product["title_slugged"] ?>.jpg" alt="<?= $product["title_slugged"] ?>">
                            <img class="scale-trick" src="/images/products/scale-trick.png" />
                        </div>
                    </a>
                    <h4 class="remove-margin-top margin-bottom-5"><a href="/shop/product/<?= $product["product_id"] . "-" . $product["title_slugged"] ?>"><?= $product["title"] ?></a></h4>
                    <p class="listing-price">
                        <strong>
                            <?php if ($product["discount_price"] != "0.00") { ?><s><?php } ?>
                                $<?= $product["price"] ?>
                                <?php if ($product["discount_price"] != "0.00") { ?></s>&nbsp;<?php
                                echo "<span class='discount-price'>$" . $product["discount_price"] . "</span>";
                            }
                            ?>
                        </strong>
                    </p>

                    <form class="add-to-cart-form">
                        <button data-quantity="1" data-mid="<?= $member_data["member_id"] ?>" data-pid="<?= $product["product_id"] ?>" data-price="<?= $price ?>" class="primary-button">Add to Cart</button>
                        <div class="product-cart-message"></div>

                    </form>




                </div>
            </div>
        </div>
        <?php
        $counter++;
        if ($counter % 3 == 0) {
            ?>

        </div>
        <div class="row  margin-bottom-20 product-row">
            <?php
        }
    }
    ?>
</div>