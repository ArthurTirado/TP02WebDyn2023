<?php declare(strict_types=1);

require_once __DIR__."/CartItem.php";

class Cart
{
    private $items;

    public function __construct()
    {
        if(!isset($items)){
            $this->items = array();
        }
    }

    function is_item_already_in_cart($sku): bool {
        return isset($this->items[$sku]);
    }

    function add_item_to_cart(string $sku, int $qte) {
        if($this->is_item_already_in_cart($sku)){
            $this->items[$sku] += $qte;
        } else {
            $this->items[$sku] = $qte;
        }
    }

    function get_cart_items(): array {
        return $this->items;
    }

    function get_total_price(array $products): float {
        $total_price = 0;
        foreach($products as $product){
            $total_price += $this->items[$product["sku"]]*$product["price"];
        }
        return $total_price;
    }

    function remove(string $sku){
        unset($this->items[$sku]);
    }
}