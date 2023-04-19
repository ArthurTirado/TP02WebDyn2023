<?php declare(strict_types=1);

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/ProductDAO.php";

$db = connect_db();
$product_dao = new ProductDAO($db);
$products = $product_dao->return_product();

// Temporaire:
$user = "";

function is_empty_or_blank($object) {
    return trim($object) === "";
}
//.
require_once __DIR__."/html/index-view.php";