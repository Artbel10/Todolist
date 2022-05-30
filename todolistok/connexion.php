<?php

function getConnection(){

try{
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'mytodolist';
    $db_host     = 'localhost';
    $db = new PDO('mysql:host=localhost;dbname=mytodolist', 'root', 'root');
    // echo "connexion a la base de donnée ok";
    return $db;
} catch (Exception $e){
    die('Erreur : '. $e->getMessage());
}
}
// normalement cette page est créée pour éviter de taper la connexion a la BDD sur chaque page , je dois l'inclure dans mon code (mais je n'ai pas réussi..)
?>