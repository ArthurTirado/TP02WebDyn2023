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
            $this->db->beginTransaction();
            $statement = $this ->db->prepare("INSERT INTO user(email, password, first_name, last_name, shipping_address ) VALUES (?,?,?,?,?)");
            $password = password_hash($password, PASSWORD_BCRYPT);
            $statement->execute([$email, $password,$first_name,$last_name,$shipping]);
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

    function get_user_id(string $user){
        try {
            $statement = $this->db->prepare("SELECT id FROM user WHERE email = ?");
            $statement->execute([$user]);
            $result = $statement->fetch();
            return $result["id"];
        } catch (PDOException $e) {
            exit("Unable to get the users id from database :{$e->getMessage()}");
        }
    }

    function get_user_name(int $user_id){
        try {
            $statement = $this->db->prepare("SELECT first_name FROM user WHERE id = ?");
            $statement->execute([$user_id]);
            $result = $statement->fetch();
            return $result["first_name"];
        } catch (PDOException $e) {
            exit("Unable to get the users name from database :{$e->getMessage()}");
        }
    }

    function get_user_last_name(int $user_id){
        try {
            $statement = $this->db->prepare("SELECT last_name FROM user WHERE id = ?");
            $statement->execute([$user_id]);
            $result = $statement->fetch();
            return $result["last_name"];
        } catch (PDOException $e) {
            exit("Unable to get the users last name from database :{$e->getMessage()}");
        }
    }
}