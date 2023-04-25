<?php declare(strict_types=1);

session_start();
/*
require_once __DIR__."/src/database.php";
require_once __DIR__."/src/CartDAO.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/util.php";*/
require_once __DIR__."/src/database.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/util.php";

$db = connect_db();
$product_dao = new ProductDAO($db);
$products = $product_dao->get_all_skus();
$user = "";/*

$db = connect_db();
$cart_dao = new CartDAO($db);
$product_dao = new ProductDAO($db);
$user = "Merlin";*/


require_once __DIR__."/html/cart-view.php";