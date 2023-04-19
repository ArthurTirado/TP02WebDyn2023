<?php declare(strict_types=1);
function connect_db() : PDO {
    try {
        return new PDO("mysql:host=localhost;dbname=baie_ourson", "student", "ubuntu", array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ));
    } catch (PDOException $e) {
        exit("Unable to connect to database :{$e->getMessage()}");
    }
}


?>