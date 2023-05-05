<?php declare(strict_types=1);

require_once __DIR__."/src/util.php";
require_once __DIR__."/src/database.php";
require_once __DIR__."/src/Order.php";
require_once __DIR__."/src/UserDAO.php";
require_once __DIR__."/src/CheckoutDAO.php";

session_start();

$user = $_SESSION["user"];
$cart = $_SESSION["cart"];

if(is_null_or_blank($user)){
    header("location:index.php");
    exit;
}

$db = connect_db();
$checkout_dao = new CheckoutDao($db);
$user_dao = new UserDao($db);
$cart_items = $cart->get_cart_items();
$user_id = $user_dao->get_user_id($user);
$checkout_dao->add_order($user_id);
$order_id = $checkout_dao->get_order_id($user_id);
$cart_keys = array_keys($cart_items);
foreach($cart_keys as $key){
    $sku = intval($key);
    $qte = $cart_items[$key];
    $checkout_dao->add_order_item($order_id, $sku, $qte);
}
$name = $user_dao->get_user_name($user_id);
$last_name = $user_dao->get_user_last_name($user_id);
$_SESSION["cart"] = new Order();

require_once __DIR__."/html/confirm.php";