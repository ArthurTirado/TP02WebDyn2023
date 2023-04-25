<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Panier</title>
</head>
<body>
    <header class="flex-space-between bottom-border">
        <a href="index.php"><img src="img/brand.svg" alt="logo de la compagnie"></a>
        <div class="flex-space-between">
            <a href="cart.php"><img class="shopping-cart" src="img/cart.svg"></a>
            <?php if(is_null_or_blank($user)) {?>
                <a href="sign-in.php" class="blue-button">Connexion</a>
            <?php } else { ?>
                <a href="sign-out.php">Se déconnecter</a>
            <?php } ?>
        </div>
    </header>
    <main>
    <?php foreach($products as $product){?>
            <form class="products-list-form flex-space-between" action="product.php" method="GET">
                <div class="flex-space-between">
                    <img class="small-image" src="img/154789.png" alt="image du produit"/>
                    <div class="products-list-div">
                        <h3>Nom du test</h3>
                        <p>24.99 $</p>
                        <p>x2</p>
                    </div>
                </div>
                <input class="invisible" type="text" name="sku" id="sku" value="154789"/>
                <input class="cart-deleate" type="submit" value="Supprimer"/>
            </form>
        <?php } ?>
    </main>
</body>
</html>