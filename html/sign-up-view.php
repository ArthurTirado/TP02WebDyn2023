<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body>
    <main class="sign-up-main">
        <form class="sign-up-form" action="sign-up.php" method="post">
            <a class="sign-up-form-logo grid-col-2" href="index.php"><img src="img/brand-large.svg" alt="logo de la compagnie"></a>
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
            <h2 class="grid-col-2">Informations sur le compte</h2>

            <label for="email">Email:</label>
            <input class="default-input" type="text" name="email" id="email" placeholder="Adresse de courriel">
            
            <label for="password">Mot de passe:</label>
            <input class="default-input" type="password" name="password" id="password" placeholder="********">
            
            <label for="confirm-password">Confirmation du mot de passe:</label>
            <input class="default-input" type="password" name="confirm_password" id="confirm_password" placeholder="********">

            <h2 class="grid-col-2">Informations sur la livraison</h2>

            <label for="first-name">Prénom:</label>                  
            <input class="default-input" type="text" name="first_name" id="first_name" placeholder="Prénom">
            
            <label for="last-name">Nom:</label>
            <input class="default-input" type="text" name="last_name" id="last_name" placeholder="Nom">
            
            <label for="shipping">Adresse de livraison:</label>
            <input class="default-input" type="text" name="shipping" id="shipping" placeholder="Adresse de Livraison">
            
            <input type="submit" class="blue-button button grid-col-2" value="Créer un compte">
        </form>
    </main>
    <footer>
        <div>Copyright 2023 Arthur Tirado et Hugo Larochelle</div>
    </footer>
</body>
</html>
</html>