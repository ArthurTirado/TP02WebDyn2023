<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Créer une Compte</title>
</head>
<body>
    <main class="connect-main">
        <form action="sign-in.php" method="post" class="sign-up-form">
        <a class="sign-up-form-logo grid-col-2" href="index.php"><img  src="img/brand-large.svg" alt="logo de la compagnie"></a>
            <h1 class="text-center grid-col-2">Connexion</h1>
            <div class="text-center grid-col-2">Utiliser votre compte Ourson</div>
            <?php if (!empty($errors)) { ?>
                <div class="alert grid-col-2">
                    <h4 class="alert-heading">Erreur</h4>
                    <ul>
                        <?php foreach ($errors as $error) { ?>
                            <li><?= $error ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <label class="block-label" for="email">Email:</label>
            <input class="default-input" type="text" name="email" id="email" placeholder="Adresse de courriel">

            <label class="block-label"for="password">Mot de passe:</label>
            <input class="default-input" type="password" name="password" id="password" placeholder="********">

            <div class="flex-space-between grid-col-2">
                <a class="create-account-hyperlink" href="sign-up.php">Créer une compte</a>
                <input type="submit" class="grey-button button" value="Se connecter">
            </div>
            </form>
        </div>
    </main>
    <footer>
        <div>Copyright 2023 Arthur Tirado et Hugo Larochelle</div>
    </footer>
</body>
</html>
</html>