<?php declare(strict_types=1);

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/Order.php";
require_once __DIR__."/src/CartItem.php";
require_once __DIR__."/src/util.php";

session_start();

if(!isset($_SESSION["user"])){
    $_SESSION["user"] = "";
}

$user = $_SESSION["user"];
$cart = $_SESSION["cart"] ?? new Order();

$db = connect_db();
$product_dao = new ProductDao($db);
$products = $product_dao->get_all_skus();
$sku = $_GET["sku"] ?? "";
$qte = intval($_GET["qte"] ?? 0);

if(!is_null_or_blank($sku)){
    $cart->add_item_to_cart($sku, $qte);
}
$_SESSION["cart"] = $cart;

require_once __DIR__."/html/index-view.php";