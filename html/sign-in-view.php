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
        <div class="connect-block">
            <img src="img/brand-large.svg" alt="logo de la compagnie">
            <h2>Connexion</h2>
            <div>Utiliser votre compte Ourson</div>
            <?php if (!empty($errors)) { ?>
                <div class="alert">
                    <h4 class="alert-heading">Erreur</h4>
                    <ul>
                        <?php foreach ($errors as $error) { ?>
                            <li><?= $error ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <form action="sign-in.php" method="post" class="sign-in-form">
               <div class="flex">
                <div>
                  <label class="block-label" for="email">Email:</label>
                  <label class="block-label"for="password">Mot de passe:</label>
                </div>
                <div>
                 <input class="default-input block-form" type="text" name="email" id="email" placeholder="Adresse de courriel">
                  <input class="default-input block-form" type="password" name="password" id="password" placeholder="********">
                </div>
               </div>
              <div class="flex-space-between">
                 <a href="sign-up.php">Créer une compte</a>
                 <input type="submit" class="default-button" value="Se connecter">
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