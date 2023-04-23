<?php declare(strict_types=1);

session_start();

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/util.php";

$db = connect_db();
$product_dao = new ProductDAO($db);
$products = $product_dao->get_all_skus();
$user = "";

require_once __DIR__."/html/index-view.php";