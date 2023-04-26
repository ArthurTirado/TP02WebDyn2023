<?php declare(strict_types=1);

if(!isset($_SESSION["user"])){
    session_start();
}


class CartDao
{
    private PDO $db;
    private $cart;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->cart[] = $_SESSION["cart"] ?? [];
    }
    
    function is_item_already_in_cart($sku){
        return isset($this->cart[$sku]);
    }

    function add_item_to_cart(string $sku, int $qte) {
        if($this->is_item_already_in_cart($sku)){
            $this->cart[$sku] = get_quantity_from_session($sku) + $qte;
        } else{
            $this->cart[] = [$sku => "$qte"];
        }
    }

    function get_quantity_from_session(string $searchedSku) : int {
        return intval($cart[$searchedSku]);
    }
}