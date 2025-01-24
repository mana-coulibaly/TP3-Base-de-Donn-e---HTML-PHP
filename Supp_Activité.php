<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uqtr";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!empty($_GET["id"])){
    //Supprimer l'exercice dont l'id est envoyé avec l'URL
    $ids = mysqli_real_escape_string($conn,$_GET["id"]);
    $sql = "DELETE FROM activité WHERE Id=$ids";
    echo $sql;
    if (mysqli_query($conn, $sql)) {
        $message= "l'activité a été supprimé avec succés";
    } else {
        $mesasge="Erreur pendant la suppression de l'activité: " . mysqli_error($conn);
    }
    //Redirection vers la page Administrateur.php avec un message résultat de la suppression
    header("Location:Administrateur.php?message=$message");

}
