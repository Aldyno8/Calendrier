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

echo'salut';

if (isset($_POST['save'])){
    $name = $_POST['nom'];
    $description = $_POST['about'];
    $begin = $_POST['debut'];
    $end = $_POST['end'];
    var_dump($name);

    $requete = $db->prepare("INSERT INTO evenement (id, Nom, about, debut, fin) VALUES (:id, :Nom, :about, :debut, :fin)");
    $rep = $requete->execute(array(
        'id'=> '',
        'Nom'=> $name,
        'about'=> $description,
        'debut'=> $begin,
        'fin'=> $end)) ; 

        header('location: ../view/calendar.view.php');
       
    
}
?>