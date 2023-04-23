<?php declare(strict_types=1);

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
    /* Bonne exemple
    public function findAllAnimesByKeywords(string $keywords) : array {
        try {
            $statement = $this->db->prepare("SELECT * FROM anime WHERE title LIKE ?");
            $statement->execute(["%$keywords%"]);
            return $statement->fetchAll();
        } catch (PDOException $e) {
            exit("Unable to read animes from database :{$e->getMessage()}");
        }
    }*/
}