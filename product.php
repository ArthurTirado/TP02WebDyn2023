<?php
require_once __DIR__."/src/database.php";
require_once __DIR__."/src/ProductDAO.php";

$db = connect_db();
$sku = "154789";
$product_dao = new ProductDao($db);
$product = $product_dao->return_product($sku);

require_once __DIR__."/html/product-view.php";
?>