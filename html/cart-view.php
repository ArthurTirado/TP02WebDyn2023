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
                <a href="sign-in.php" class="connect">Connexion</a>
            <?php } else { ?>
                <a href="sign-out.php" class="disconnect">Se déconnecter</a>
            <?php } ?>
        </div>
    </header>
    <main class="global-margin">
        <h1>Votre panier</h1>
        <?php if(!isset($cart)){ ?>
            <p>Votre panier est vide.</p>
        <?php } else {
            foreach($products as $product){?>
            <form class="products-list-form flex-space-between" action="cart.php" method="GET">
                <div class="products-list-line">
                    <img class="small-image" src="img/<?= $product["sku"] ?>.png" alt="image du produit"/>
                    <div class="products-list-div">
                        <h3><?= $product["name"] ?></h3>
                        <p><?= $product["price"] ?> $</p>
                        <p>x<?= $cart_items[$product["sku"]] ?></p>
                    </div>
                </div>
                <input class="invisible" type="text" name="sku" id="sku" value="<?= $product["sku"] ?>"/>
                <input class="cart-deleate" type="submit" value="Supprimer"/>
            </form>
            <?php } ?>
            <h1>Sous-total</h1>
            <h1><?= $totalPrice ?> $</h1>
            <a href="checkout.php">Passer la commande</a>
        <?php } ?>
    </main>
</body>
</html>