 <!doctype html>
<html lang="fr">
    <head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index1.css" media="screen" type="text/css" />
        <title>Page d'inscription à la TODO</title>
    </head>
    <body>
        <div id="container">
            <!-- formulaire de création de compte pour acceder a la todolist -->
            <form class="connection"  action="connectionbdd.php" method="POST">
            <H1> Page d'inscription 🔐</h1>
            <label><b>Votre nom d'utilisateur</b></label>
    <input type="text" name="username" placeholder="votre prénom" required pattern="^[A-Za-z '-]+$">
    <label><b>Créer votre mot de passe</b></label>
    <input type="password" name="password" required="required" placeholder="tapez votre mot de passe" required pattern="^[A-Za-z '-]+$">
    <button id='submit'>Créer son compte</button>
    <p><a href="login.php">↩️</a> Revenir à la page de connexion<p>
</form>
        </div>
    </body>
</html> 

