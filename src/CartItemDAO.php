<?php declare(strict_types=1);

class CartItemDao
{
    private $sku;
    private $qte;
    public function __construct(string $sku, int $qte)
    {
        $this->sku = $sku;
        $this->qte = $qte;
    }

    public function get_sku(): string {
        return $this->sku;
    }
    
    public function get_qte(): int {
        return $this->qte;
    }

    public function add_qte(int $qte_to_add) {
        $this->qte += $qte_to_add;
    }
}