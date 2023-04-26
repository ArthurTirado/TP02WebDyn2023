<?php declare(strict_types=1);

if(!isset($_SESSION["user"])){
    session_start();
}


class CartItemDao
{
    private PDO $db;
    private $sku;
    private $qte

    public function __construct(PDO $db, string $sku, int $qte)
    {
        $this->db = $db;
        $this->sku = $sku;
        $this->qte = $qte;
    }

    public function get_sku(): string {
        return $this->sku;
    }
    
    public function get_qte(): string {
        return $this->qte;
    }

    public function add_qte(int $qte_to_add) {
        $this->qte += $qte_to_add;
    }
}