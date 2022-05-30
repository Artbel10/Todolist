<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'mytodolist';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('Pas connecté à la BDD');
    
    // j'ai trouvé sur internet qu'il faut utiliser les  deux fonctions mysqli_real_escape_string et htmlspecialchars pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    { // je vérifie les noms utilisateurs et mot de passe
        $requete = "SELECT count(*) FROM utilisateur where 
              nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // ici c'est lorsque le nom utilisateur et mot de passe sont correctes
        {
           $_SESSION['username'] = $username;
           header('Location: principale.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // ici c'est au cas ou l'utilisateur ou mot de passe est incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // ici c'est au cas ou l'utilisateur ou mot de passe est vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // je ferme la connexion
?>