<?php

if(!isset($_SESSION["user"])){
    session_start();
}

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/util.php";

$db = connect_db();
$sku = $_GET["sku"];
$product_dao = new ProductDao($db);
$product = $product_dao->return_product($sku);
$user="";

require_once __DIR__."/html/product-view.php";
?>