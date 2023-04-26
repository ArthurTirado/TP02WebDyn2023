<?php declare(strict_types=1);

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/CartDAO.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/util.php";

if(!isset($_SESSION["user"])){
    session_start();
}

$db = connect_db();
$cart_dao = new CartDao();
$product_dao = new ProductDao($db);
$user = "Merlin";

$cart_items = $cart_dao->get_cart_items();
$products = $product_dao->get_cart_products_skus($cart_items);
$total_price = $cart_dao->get_total_price($products);

require_once __DIR__."/html/cart-view.php";