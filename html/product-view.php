<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <nav>

    </nav>
    <main>
        <div class="flex">
            <img src="img/154789.png" alt="<?= $name ?>">
        </div>
        <div class="product-name">
            <?= $name ?>
        </div>
        <div class="product-description">
            <?= $description ?>
        </div>
        <div class="price">
            <?= $price ?>
        </div>
        <form action="product.php" method="get">
            <input type="number">
            <input type="submit" value="Ajouter au panier">
        </form>
    </main>
    <footer>
        <div>Copyright 2023 Arthur Tirado et Hugo Larochele</div>
    </footer>
</body>
</html>