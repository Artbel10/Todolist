<!doctype html>
<html lang="fr"> 
    <head>
        <meta charset="utf-8">
        <!-- j'importe les connexions a la feuille php -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index1.css" media="screen" type="text/css" />
        <script src="https://kit.fontawesome.com/1036f3be44.js" crossorigin="anonymous"></script>
        <title>Bienvenue sur la TODO</title>
    </head>
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
    <div id="code">
<?php
//Je me connecte a la base de donnée
 $erreurs = "";
 $db = new PDO('mysql:host=localhost;dbname=mytodolist', 'root', 'root');
  
 if (isset($_POST['creer_tache'])) { // je vérifie que l'element POST existe
    if (empty($_POST['creer_tache'])) {  // je vérifie la valeur
        $erreurs = 'Vous devez indiquer la valeur de la tâche';
    } elseif (empty($_POST['personne'])) {  
        $erreurs = 'Vous devez indiquer une personne';
    } else{
        $tache = $_POST['creer_tache'];
        $affect = $_POST['personne'];


        $db->query("INSERT INTO todolist(taches,personnes) VALUES('$tache','$affect')"); // j'insère la tâche dans la base de donnée
    }
 }
  
 if(isset($_GET['supprimer_tache'])) {
     $id = $_GET['supprimer_tache'];
     $db->exec("DELETE FROM todolist WHERE id=$id");
 }

 ?>
<!-- Création du formulaire de la todolist -->
 <div class="header">
     <H1 class="header_titre">MyToTool 📌</H1>
 </div>
  
 <form class="taches_input" method="post" action="principale.php">
  
  
     <input id="inserer" type="text" name="creer_tache" placeholder="Quelle est la tâche ? 📝"/>
     <select name="personne">
<option value="Tout le monde"> Tout le monde</option>
<option value="Arthur"> Arthur</option>
<option value="Alex"> Alexandre</option>
<option value="Julien"> Julien</option>
</select>
     <button id="envoyer">Créer</button>
 </form>

<!-- je verifie si il n'y a pas d'erreur --> 
 <?php
 if (isset($erreurs)) {
     ?>
     <p><?php echo $erreurs ?></p>
     <?php
 }
 ?>
  
<!-- Je fais ressortir les données de la BDD -->
 <table class="tasks">
     <tr>
         <th>
             N°
         </th>
         <th>
             Tâches
         </th>
         <th>
             Pour qui 
         </th>
         <th>
             Faite ⎜ A modifier
         </th>
     </tr>
     <?php
     $reponse = $db->query('Select * from todolist'); // Ici je fais une requête pour récupérer les tâches
     while ($taches = $reponse->fetch()) { // while = boucle des taches
         ?>
         <tr>
             <td><?php echo $taches['id'] ?></td>
             <td><?php echo $taches['taches'] ?></td>
             <td><?php echo $taches['personnes'] ?></td>
             <td><a class="suppr" href="principale.php?supprimer_tache=<?php echo $taches['id'] ?>"><i class="fa-solid fa-xmark"></i></a> ⎜ <a class="suppr2" href="modal.php?taches=<?php echo $taches['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
         </tr>
         <?php
     }
  
  
     ?>
 </table>
            
        </div>

</html>
