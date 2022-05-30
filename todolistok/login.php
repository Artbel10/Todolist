<!doctype html>
<html lang="fr">
    <head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index1.css" media="screen" type="text/css" />
        <title>Page de connexion à la TODO</title>
    </head>
    <body>
        <div id="container">
            <!-- fomulaire de connexion -->
            
            <form class="connection" action="verification.php" method="POST">
                <h1>Connexion 🚀</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <button id='submit'>Se connecter</button>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                <p>Ou créer un compte <a href="create.php">➡️</a><p>
            </form>
        </div>
    </body>
</html>