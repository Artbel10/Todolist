<!doctype html>
<html lang="fr">
<head>
           <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index1.css" media="screen" type="text/css" />
        <title>Création de compte</title>
    </head>
    <body>
    <div id="container" class="connection">
        <h1>Votre création de compte</h1>
        <?php
// on récupère les données saisies par l'utilisateur 
if(isset($_POST["username"]) && isset($_POST["password"])){    
    echo "<h2>👍</h2><p style='color:green'>Votre création de compte a été enregistrée</p>" . 'Revenez à la page de connexion <a href="login.php">🔙</a>';
}else{
    echo "<h2>👎</h2><p style='color:red'>Désolé, votre demande" . " n'est pas prise en compte</p>" . 'Veuillez réessayer <a href="create.php">🔁</a>';
}

$prenom = $_POST["username"];
$password = $_POST["password"];
$asignbdd = getConnection();

insert($asignbdd, $prenom, $password); 

function getConnection(){

    try{
        $db_username = 'root';
        $db_password = 'root';
        $db_name     = 'mytodolist';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name);
        // echo "connexion a la base de donnée ok";
        return $db;
    } catch (Exception $e){
        die('Erreur : '. $e->getMessage());
    }
}
// je prépare l'intègration des nouveaux noms utilisateurs et mot de passe dans la BDD
function insert($db, $prenom, $password){

        $requete = $db->prepare("INSERT INTO utilisateur (nom_utilisateur, mot_de_passe) VALUES (?,?)");
        
        $requete->execute([$prenom, $password]);
}
?>
</div>
</body>
</html>