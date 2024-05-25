<?php
//connexion à la base de donnée
 $user = 'root';
$password = '';

try {
    $db = new PDO('mysql:host=localhost;dbname=calendar', $user, $password );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
} catch (\Throwable $th) {
    echo 'Erreur lors de la connexion a la base de données'. $th->getMessage();
}

// Vérifie si l'id est detecté

$id = $_GET['id']??null;
$req = $db->query("SELECT * FROM evenement WHERE id='$id'");
$rep = $req->fetch() ;
?>