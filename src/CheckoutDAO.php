<?php declare(strict_types=1);

require_once __DIR__."/Order.php";

class CheckoutDao
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function add_order(string $sku) {
        try {
            $this->db->beginTransaction();
            $statement = $this->db->prepare("INSERT INTO `order`(user_id) VALUES (?)");
            $statement->execute([$user_id]);
            $this->db->commit();
        } catch (PDOException $e) {
            exit("Unable to add order into database :{$e->getMessage()}");
        }
    }

    function get_all_skus() : array {
        try {
            $statement = $this->db->prepare("SELECT * FROM product");
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            exit("Unable to get the skus from database :{$e->getMessage()}");
        }
    }

    function get_cart_products_skus(array $cart_items) : array {
        $products = [];
        try {
            for($i = 0; $i < sizeof($cart_items); $i++){
                $statement = $this->db->prepare("SELECT * FROM product WHERE sku = ?");
                $statement->execute([array_keys($cart_items)[$i]]);
                $product = $statement->fetch();
                if(!empty($product)){
                    $products[] = $product;
                }
            }
            return $products;
        } catch (PDOException $e) {
            exit("Unable to get the skus from database :{$e->getMessage()}");
        }
    }
}