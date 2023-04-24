<?php declare(strict_types=1);

class ProductDao
{
    private PDO $db;
    $cart = $_SESSION["cart"] ?? "";

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function add_item_to_cart(string $sku, int $qte) {
        $cart[] = $sku => "$qte";
    }

    function get_quantity_from_session(string $searchedSku) : int {
        $qte = $cart[$searchedSku];
        return intval($qte);
    }