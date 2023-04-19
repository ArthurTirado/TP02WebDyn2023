<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Product</title>
</head>
<body>
    <header class="flex-space-between bottom-border">
        <a href="index.php"><img src="img/brand.svg" alt="logo de la compagnie"></a>
        <div class="flex-space-between">
            <a href="cart.php"><img class="shopping-cart" src="img/cart.svg"></a>
            <?php if(is_empty_or_blank($user)) {?>
                <a href="sign-in.php" class="blue-button">Connexion</a>
            <?php } else { ?>
                <a href="sign-out.php">Se déconnecter</a>
            <?php } ?>
        </div>
    </header>
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