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
            <div>Utiliser votre compte Ourson</div>
            <form action="sign-in.php" method="get" class="sign-in-form">
               <div class="flex">
                    <div>
                        <label class="block-label" for="email">Email:</label>
                        <label class="block-label"for="password">Mot de passe:</label>
                        <label class="block-label"for="confirm-password">Confirmation du mot de passe:</label>
                    </div>
                    <div>
                        <input class="default-input block-form" type="text" name="email" id="email" placeholder="Adresse de courriel" required>
                        <input class="default-input block-form" type="password" name="password" id="password" placeholder="********" required>
                        <input class="default-input block-form" type="confirm-password" name="confirm-password" id="password" placeholder="********" required>
                    </div>
                </div>
        
                <div class="flex">
                    <div>
                         <label class="block-label"for="first-name">Prénom:</label>                  
                        <label class="block-label"for="last-name">Nom:</label>
                        <label class="block-label"for="shipping">Adresse de livraison:</label>
                    </div>
                    <div>
                        <input class="default-input block-form" type="text" name="first-name" id="first-name" placeholder="Prénom" required>
                        <input class="default-input block-form" type="text" name="last-name" id="last-name" placeholder="Nom" required>
                        <input class="default-input block-form" type="text" name="shipping" id="shipping" placeholder="Adresse de Livraison" required>
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