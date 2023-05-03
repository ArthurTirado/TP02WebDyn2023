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
        <form action="sign-in.php" method="post" class="sign-up-form">
            <img class="sign-up-form-logo grid-col-2" src="img/brand-large.svg" alt="logo de la compagnie">
            <h1 class="text-center grid-col-2">Connexion</h1>
            <div class="text-center grid-col-2">Utiliser votre compte Ourson</div>
            <h2 class="grid-col-2">Informations sur le compte</h2>

            <label for="email">Email:</label>
            <input class="input-test" type="text" name="email" id="email" placeholder="Adresse de courriel" required>
            
            <label for="password">Mot de passe:</label>
            <input class="input-test" type="password" name="password" id="password" placeholder="********" required>
            
            <label for="confirm-password">Confirmation du mot de passe:</label>
            <input class="input-test" type="confirm-password" name="confirm-password" id="confirm-password" placeholder="********" required>

            <h2 class="grid-col-2">Informations sur la livraison</h2>

            <label for="first-name">Prénom:</label>                  
            <input class="input-test" type="text" name="first-name" id="first-name" placeholder="Prénom" required>
            
            <label for="last-name">Nom:</label>
            <input class="input-test" type="text" name="last-name" id="last-name" placeholder="Nom" required>
            
            <label for="shipping">Adresse de livraison:</label>
            <input class="input-test" type="text" name="shipping" id="shipping" placeholder="Adresse de Livraison" required>
            
            <input type="submit" class="blue-button button grid-col-2" value="Créer un compte">
        </form>
    </main>
    <footer>
        <div>Copyright 2023 Arthur Tirado et Hugo Larochelle</div>
    </footer>
</body>
</html>
</html>