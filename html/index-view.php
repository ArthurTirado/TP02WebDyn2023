<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
    <header>
        <img src="img/brand.svg" alt="logo de la compagnie">
        <a href="cart.php"><img src="img/cart.svg"></a>
        <?php if(is_empty_or_blank($user)) {?>
        <a href="sign-in.php">Connexion</a>
        <?php } else { ?>
            <a href="sign-out.php">Se déconnecter</a>
        <?php } ?>
    </header>
    <main>

    </main>
    <footer>

    </footer>
</body>
</html>