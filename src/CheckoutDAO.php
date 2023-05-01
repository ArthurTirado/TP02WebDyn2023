<?php declare(strict_types=1);

require_once __DIR__."/Order.php";

class CheckoutDao
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function add_order(int $user_id) {
        try {
            $this->db->beginTransaction();
            $statement = $this->db->prepare("INSERT INTO `order`(user_id) VALUES (?)");
            $statement->execute([$user_id]);
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            exit("Unable to add order into database :{$e->getMessage()}");
        }
    }

    function get_order_id(int $user_id){
        try {
            $this->db->beginTransaction();
            $statement = $this->db->prepare("SELECT id FROM `order` WhERE user_id = ?");
            $statement->execute([$user_id]);
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            exit("Unable to add order into database :{$e->getMessage()}");
        }
    }

    function add_order_item(int $order_id, string $sku, int $qte){
        try {
            $this->db->beginTransaction();
            $statement = $this->db->prepare("INSERT INTO `order`(order_id, product_sku, quantity) VALUES (?,?,?)");
            $statement->execute([$order_id, $sku, $qte]);
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            exit("Unable to add order into database :{$e->getMessage()}");
        }
    }
}