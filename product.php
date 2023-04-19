<?php
require_once __DIR__."/src/database.php";
$db = connect_db();
$sku = "154789";
$product = return_product($db,$sku);

function is_empty_or_blank($object) {
    return trim($object) === "";
}

require_once __DIR__."/html/product-view.php";
?>