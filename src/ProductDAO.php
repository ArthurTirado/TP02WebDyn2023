<?php declare(strict_types=1);

require_once __DIR__."/Cart.php";
require_once __DIR__."/CartItem.php";

class ProductDao
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function return_product(string $sku) : array {
        try {
            $statement = $this->db->prepare("SELECT name, description, price FROM product WHERE sku = ?");
            $statement->execute([$sku]);
            return $statement->fetch();
        } catch (PDOException $e) {
            exit("Unable to find sent sku in database :{$e->getMessage()}");
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
    /*
    function get_cart_products_skus(array $cart_items) : array {
        $products = [];
        try {
            foreach($cart_items as $item){
                $statement = $this->db->prepare("SELECT * FROM product WHERE sku = ?");
                $statement->execute([$item->get_sku()]);
                $products[] = $statement->fetchAll();
            }
            return $products;
        } catch (PDOException $e) {
            exit("Unable to get the skus from database :{$e->getMessage()}");
        }
    }*/
}