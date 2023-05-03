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
    <main class="disconnect-main">
        <div class="connect-block">
            <img src="img/brand-large.svg" alt="logo de la compagnie">
            <h2>Connexion</h2>
            <div>Créer votre compte Ourson</div>
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
            <form action="sign-up.php" method="post" class="sign-in-form">
               <div class="flex">
                    <div>
                        <label class="block-label" for="email">Email:</label>
                        <label class="block-label"for="password">Mot de passe:</label>
                        <label class="block-label"for="confirm-password">Confirmation du mot de passe:</label>
                    </div>
                    <div>
                        <input class="default-input block-form" type="text" name="email" id="email" placeholder="Adresse de courriel" >
                        <input class="default-input block-form" type="password" name="password" id="password" placeholder="********" >
                        <input class="default-input block-form" type="confirm_password" name="confirm_password" id="confirm_password" placeholder="********" >
                    </div>
                </div>
        
                <div class="flex">
                    <div>
                         <label class="block-label"for="first-name">Prénom:</label>                  
                        <label class="block-label"for="last-name">Nom:</label>
                        <label class="block-label"for="shipping">Adresse de livraison:</label>
                    </div>
                    <div>
                        <input class="default-input block-form" type="text" name="first_name" id="first_name" placeholder="Prénom" >
                        <input class="default-input block-form" type="text" name="last_name" id="last_name" placeholder="Nom" >
                        <input class="default-input block-form" type="text" name="shipping" id="shipping" placeholder="Adresse de Livraison" >
                    </div>
                </div>
              <div class="flex-space-between">
                 <a href="sign-in.php">J'ai dèja une compte</a>
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