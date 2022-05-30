<?php

$var = $_POST["id"];
$var1 = $_POST['tache'];

$db_username = 'root';
    $db_password = 'root';
    $db_name     = 'mytodolist';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('Pas connecté à la BDD');
// Je fais une mise à jour de la tache par la requete ci dessous
     $requete = "UPDATE todolist SET taches='$var1' WHERE id='$var'";

     $result = $db->query($requete);

     header('Location: principale.php');
?>