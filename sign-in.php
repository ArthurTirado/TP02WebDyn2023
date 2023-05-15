<?php declare(strict_types=1);

require_once __DIR__."/src/SignInForm.php";

session_start();

// Valeurs par défaut.
$email = "";
$password = "";
$errors = [];
// Validation du formulaire.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $submitted_form = new SignINForm($_POST);
    $errors = $submitted_form->verify_form();

    if (empty($errors)) {
        if (!$submitted_form->check_user_exists()) {
            $errors[] = "Cette combinaison de nom d'utilisateur et de mot de passe nous est inconnue. Désirez-vous vous créer un compte ?";
        } else {
            $_SESSION["user"] = $_POST["email"];
            header("location:index.php");
            exit;
        }
    }
}


require_once __DIR__."/html/sign-in-view.php";
