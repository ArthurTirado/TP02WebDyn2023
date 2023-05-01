<?php declare(strict_types=1);

require_once __DIR__."/src/util.php";
//require_once __DIR__."/src/database.php";
require_once __DIR__."/src/Order.php";
//require_once __DIR__."/src/UserDAO.php";

session_start();

$user = $_SESSION["user"];/*
$cart = $_SESSION["cart"];

$db = connect_db();
$checkout_dao = new CheckoutDao($db);
$user_dao = new UserDao($db);
$user_id = $user_dao->get_user_id();
$checkout_dao->add_order($user_id);
$order_id = $checkout_dao->get_order_id($user_id);
$cart_keys = array_keys($cart);
foreach($cart_keys as $key){
    $qte = $cart[$key];
    $checkout_dao->add_order_item($order_id, $key, $qte);
}
$name = $user_dao->get_user_name();
$last_name = $user_dao->get_user_last_name();*/
$_SESSION["cart"] = new Order();

require_once __DIR__."/html/confirm.php";