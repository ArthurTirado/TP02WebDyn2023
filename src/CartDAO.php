<?php declare(strict_types=1);

require_once __DIR__."/CartItemDAO.php";

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
        $this->cart = $_SESSION["cart"] ?? [];
    }
    
    function is_item_already_in_cart($sku): bool {
        foreach($this->cart as $item){
            if($item->get_sku() === $sku){
                return true;
            }
        }
        return false;
    }

    function add_item_to_cart(string $sku, int $qte) {
        if($this->is_item_already_in_cart($sku)){
            $this->cart[$this->get_cart_item_index($sku)]->add_qte($qte);
        } else{
            $this->cart[] = new CartItemDAO($this->db,$sku, $qte);
        }
    }

    function get_cart_items(): array {
        return $this->cart;
    }
    
    function get_cart_item_index(string $sku): int {
        if($this->is_item_already_in_cart($sku)){
            for($i = 0; $i < sizeof($this->cart); $i++){
                if($this->cart[$i]->get_sku() === $sku){
                    return $i;
                }
            }
        }
        return null;
    }

    function get_quantity_from_session(string $searchedSku) : int {
        return intval($this->cart[$this->get_cart_item_index($searchedSku)]->get_qte());
    }
}