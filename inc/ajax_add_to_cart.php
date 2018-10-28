<?php

$item = array(
    "prc" => $_REQUEST["price"],
    "qty" => $_REQUEST["quantity"],
    "id" => $_REQUEST["product_id"],
    "mid" => $_REQUEST["member_id"]
);
if ($_COOKIE["my_cart"]) {

    $cart = unserialize($_COOKIE["my_cart"]);

    $already_exists = 0;
    foreach ($cart as $key => $i) {
        if ($i["mid"] == $_REQUEST["member_id"]) {
            if ($i["id"] == $item["id"]) {
                $already_exists = 1;
                if ($_REQUEST["update"] == 1) {
                    $cart[$key]["qty"] = $item["qty"];
                } else {
                    $cart[$key]["qty"] = $cart[$key]["qty"] + $item["qty"];
                }
            }
        }
    }
    if ($already_exists == 0) {
        $cart[] = $item;
    }

    $item = serialize($cart);
} else {
    $array = array();
    $array[] = $item;
    $item = serialize($array);
}
//setcookie("my_cart", "", 1, "/");
setcookie("my_cart", $item, strtotime('+200 days'), "/");

echo json_encode(array(
    'success' => true
));
exit();
?>