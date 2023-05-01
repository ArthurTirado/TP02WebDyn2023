<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Confirmation</title>
</head>
<body>
    <header class="flex-space-between bottom-border">
        <a href="index.php"><img src="img/brand.svg" alt="logo de la compagnie"></a>
        <div class="flex-space-between">
            <a href="cart.php"><img class="button grey-button shopping-cart" src="img/cart.svg"></a>
            <?php if(is_null_or_blank($user)) {?>
                <a href="sign-in.php" class="button blue-button connect">Connexion</a>
            <?php } else { ?>
                <a href="sign-out.php" class="button grey-button disconnect">Se déconnecter</a>
            <?php } ?>
        </div>
    </header>
    <main class="flex confirm">
        <h2>Merci pour votre commande <?php$name $last_name?> !</h2>
        <a href="index.php" class="button blue-button continue-button">Continuer de magasiner</a>
    </main>
    <footer>
        <div>Copyright 2023 Arthur Tirado et Hugo Larochelle</div>
    </footer>
</body>
</html>