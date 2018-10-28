<?php

if($_GET["do"]=="delete"){
    setcookie("my_cart", "", 1, "/");
    echo "Done";
}else if($_GET["do"]=="show"){
    echo "<h3>".$_COOKIE["my_cart"]."</h3>";
    print_r(unserialize($_COOKIE["my_cart"]));
}