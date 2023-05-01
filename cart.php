<?php declare(strict_types=1);

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/Order.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/util.php";

if(!isset($_SESSION["user"])){
    session_start();
}

$cart = $_SESSION["cart"];

$db = connect_db();
$product_dao = new ProductDao($db);
$user = "Merlin";
$sku = $_GET["sku"] ?? "";

if(!is_null_or_blank($sku)){
    $cart->remove($sku);
    $_SESSION["cart"] = $cart;
}

$cart_items = $cart->get_cart_items();
$products = $product_dao->get_cart_products_skus($cart_items);
$total_price = $cart->get_total_price($products);

require_once __DIR__."/html/cart-view.php";