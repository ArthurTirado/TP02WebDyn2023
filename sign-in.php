<?php declare(strict_types=1);

require_once __DIR__ . "/src/util.php";
require_once __DIR__."/src/database.php";
require_once __DIR__."/src/userDAO.php";

// Valeurs par défaut.
$email = "";
$password = "";
$errors = [];
$db = connect_db();
$userDAO = new UserDao($db);
// Validation du formulaire.
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $email = $_GET["email"] ?? null;
    $password = $_GET["password"] ?? null;

    if (is_null_or_blank($email)) {
        $errors[] = "L'adresse de courriel est requise.";
    }
    else if (!is_email_valid($email)) {
        $errors[] = "L'adresse de courriel est invalide.";
    }
    if (is_null_or_empty($password)) {
        $errors[] = "Le mot de passe est requis.";
    }

    if (empty($errors)) {
        $db = connect_db();
        
        if (!$userDAO->check_user_exists($email, $password)) {
            $errors[] = "Cette combinaison de nom d'utilisateur et de mot de passe nous est inconnue. Désirez-vous vous créer un compte ?";
        } else {
            header("location:index.php?account_logged=true");
            exit;
        }
    }
}

if(!isset($_SESSION["user"])){
    session_start();
}
require_once __DIR__."/html/sign-in-view.php";
