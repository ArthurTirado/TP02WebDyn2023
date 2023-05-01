<?php declare(strict_types=1);

class UserDao
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function create_user(string $email, string $password, $first_name, $last_name, $shipping) : bool {
        try {
            $statement = $this ->db->prepare("INSERT INTO user(email, password, first_name, last_name, shipping_address ) VALUES (?,?,?,?,?)");
            $password = password_hash($password, PASSWORD_BCRYPT);
            $statement->execute([$email, $password]);
            $this ->db->commit();
            return true;
        } catch (PDOException $e) {
            $this ->db->rollBack();
            return false;
        }
    }
    
    function check_user_exists(string $email, string $password) : bool {
        try {
            $statement = $this ->db->prepare("SELECT email, password FROM user WHERE email = ?");
            $statement->execute([$email]);
            $result = $statement->fetch();
            if($result === false){
                return false;
            }
            else{
                $is_valid_password = password_verify($password, $result["password"]);
                return $is_valid_password;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}