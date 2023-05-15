<?php declare(strict_types=1);
require_once __DIR__ . "/src/SignUpForm.php";

session_start();
$errors = []; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $submitted_form = new SignUpForm($_POST);
    $errors = $submitted_form->verify_form();

    if (empty($errors)) {

        if (!$submitted_form->create_user()) {
            $errors[] = "Cet utilisateur existe déjà. Désirez-vous vous connecter ?";
        } else {
            header("location:index.php");
            exit;
        }
    }
}


require_once __DIR__."/html/sign-up-view.php";