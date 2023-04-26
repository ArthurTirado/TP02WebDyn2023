<?php declare(strict_types=1);

session_start();
$user = "Test";
$_SESSION["user"] = $user;
if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = [];
}

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/CartDAO.php";
require_once __DIR__."/src/util.php";

$db = connect_db();
$product_dao = new ProductDAO($db);
$cart_dao = new CartDAO($db);
$products = $product_dao->get_all_skus();
$sku = $_GET["sku"] ?? "";
$qte = $_GET["qte"] ?? 0;
if(!is_null_or_blank("sku")){
    $cart_dao->add_item_to_cart($sku, intval($qte));
}

require_once __DIR__."/html/index-view.php";