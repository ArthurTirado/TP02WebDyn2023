<?php declare(strict_types=1);

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/util.php";

$db = connect_db();
$product_dao = new ProductDAO($db);
$products = $product_dao->get_all_skus();
$user = "";

var_dump($products);

require_once __DIR__."/html/index-view.php";