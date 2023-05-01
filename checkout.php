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
$checkout_dao = new CheckoutDao($db);