<?php declare(strict_types=1);

if(!isset($_SESSION["user"])){
    session_start();
}

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/CartDAO.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/util.php";

$db = connect_db();
$cart_dao = new CartDAO($db);
$product_dao = new ProductDAO($db);
$user = "Merlin";

$cart_items = $cart_dao->get_cart_items();

require_once __DIR__."/html/cart-view.php";