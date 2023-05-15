<?php declare(strict_types=1);
require_once __DIR__ . "/util.php";
require_once __DIR__ . "/UserDAO.php";
require_once __DIR__."/database.php";
class SignUpForm
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
        $this->confirm_password = $formData["confirm_password"] ?? null;
        $this->first_name = $formData["first_name"] ?? null;        
        $this->last_name = $formData["last_name"] ?? null;
        $this->shipping = $formData["shipping"] ?? null;
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
        if (is_null_or_empty($this->confirm_password)) {
            $errors[] = "La confirmation du mot de passe est requise.";
        }
        if ($this->password !== $this->confirm_password) {
            $errors[] = "Le mot de passe et la confirmation du mot de passe sont différents.";
        }
        if (is_null_or_empty($this->first_name)) {
            $errors[] = "Le prénom est requis.";
        }
        if (is_null_or_empty($this->last_name)) {
            $errors[] = "Le nom est requis.";
        }
        if (is_null_or_empty($this->shipping)) {
            $errors[] = "L'adresse est requis.";
        }
        return $errors;
    }
    public function create_user():bool{
        $db = connect_db();
        $userDAO = new UserDao($db);
        return $userDAO->create_user($this->email, $this->password,$this->first_name, $this->last_name, $this->shipping);
    }
}