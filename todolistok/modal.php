<?php
// connexion BDD
if(isset($_GET['taches'])){
$tache = $_GET['taches'];
$db_username = 'root';
    $db_password = 'root';
    $db_name     = 'mytodolist';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('Pas connecté à la BDD');
//je cherche a identifier ma tache dans la BDD
   $result = $db->query("SELECT taches from todolist WHERE id=$tache");
    $row = $result->fetch_row();
}
 ?>
 <div id="content">
            
 <a href='login.php'><span>Déconnexion</span></a>
            
            <!-- je verifie si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<br>Bonjour $user , tu es bien connecté";
                }
            ?>
    </div>

<!-- Création du formulaire de modification de taches -->
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="index1.css" media="screen" type="text/css" />
    <title>Page de modification</title>

    <body>
    <div id="container">
<form class="connection"  method="post" action="update.php">
<h1>Modification de tache ✍️</h1>
                
                <label><b>Renommer la tâche</b></label>
                <input type="text" name="tache" value="<?php echo $row[0] ?>" required="required" />
                <input type="hidden" name="id" value="<?php echo $tache ?>">
                <button id="submit" value="update" >Modifier</button>
                <p>Revenir à la TODO <a href="principale.php">⬅️</a><p>

</form>
</div>
</body>
</head>
</html>