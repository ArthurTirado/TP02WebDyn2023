<?php declare(strict_types=1);

session_start();

require_once __DIR__."/src/database.php";
require_once __DIR__."/src/ProductDAO.php";
require_once __DIR__."/src/util.php";
$user = "";

require_once __DIR__."/html/cart-view.php";