<?php declare(strict_types=1);
require_once __DIR__ . "/util.php";
require_once __DIR__ . "/UserDAO.php";
require_once __DIR__."/database.php";
class SignINForm
{
    public ?string $email;
    public ?string $password;
    public ?string $confirm_password;
    public ?string $first_name;
    public ?string $last_name;
    public ?string $shipping; 

    public function __construct(array $formData)
    {
        $this->email = $formData["email"] ?? null;
        $this->password = $formData["password"] ?? null;
    }
    public function verify_form():array{
        $errors=[];
        if (is_null_or_blank($this->email)) {
            $errors[] = "L'adresse de courriel est requise.";
        }
        else if (!is_email_valid($this->email)) {
            $errors[] = "L'adresse de courriel est invalide.";
        }
        if (is_null_or_empty($this->password)) {
            $errors[] = "Le mot de passe est requis.";
        }
        return $errors;
    }
    public function check_user_exists():bool{
        $db = connect_db();
        $userDAO = new UserDao($db);
        return $userDAO->check_user_exists($this->email, $this->password);
    }
}