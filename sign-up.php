<?php declare(strict_types=1);

require_once __DIR__ . "/src/util.php";
require_once __DIR__ . "/src/UserDAO.php";
require_once __DIR__."/src/database.php";

// Valeurs par défaut.
$email = "";
$password = "";
$password_confirmation = "";
$first_name = "";
$last_name = "";
$shipping = "";
$errors = [];
$db = connect_db();
$userDAO = new UserDao($db);

// Validation du formulaire.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;
    $password_confirmation = $_POST["password_confirmation"] ?? null;
    $first_name = $_POST["first_name"] ?? null;
    $last_name = $_POST["last_name"] ?? null;
    $shipping = $_POST["shipping"] ?? null;

    if (is_null_or_blank($email)) {
        $errors[] = "L'adresse de courriel est requise.";
    }
    else if (!is_email_valid($email)) {
        $errors[] = "L'adresse de courriel est invalide.";
    }
    if (is_null_or_empty($password)) {
        $errors[] = "Le mot de passe est requis.";
    }
    else if (is_null_or_empty($password_confirmation)) {
        $errors[] = "La confirmation du mot de passe est requise.";
    }
    else if ($password !== $password_confirmation) {
        $errors[] = "Le mot de passe et la confirmation du mot de passe sont différents.";
    }

    if (empty($errors)) {

        if (!$userDAO->create_user($email, $password,$first_name, $last_name, $shipping)) {
            $errors[] = "Cet utilisateur existe déjà. Désirez-vous vous connecter ?";
        } else {
            header("location:index.php?account_created=true");
            exit;
        }
    }
}
if(!isset($_SESSION["user"])){
    session_start();
}
require_once __DIR__."/html/sign-up-view.php";