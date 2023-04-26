<?php declare(strict_types=1);

if(!isset($_SESSION["user"])){
    session_start();
}
require_once __DIR__."/html/sign-in-view.php";
