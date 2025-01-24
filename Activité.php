<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uqtr";

// Création de la  connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Tester la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//Après clic sur le bouton "Soumettre" envoie de données par post
if(count($_POST)>2) {
    //récupération et protection des données envoyées
    $nomact = mysqli_real_escape_string($conn,$_POST["nomact"]);
    $responsable = mysqli_real_escape_string($conn, $_POST["responsable"]);
    $maximum = mysqli_real_escape_string($conn, $_POST["maximum"]);
    $sql = "INSERT INTO activité (nomact, responsable, maximum)
	VALUES ('{$nomact}', '{$responsable}', '{$maximum}')";
    //exécuter la requête d'insertion
    if (mysqli_query($conn, $sql)) {
        $message= "Activité Soumis avec succès";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
//les autres pages peuvent envoyer un message dans L’URL. On le  récupère ici pour l'afficher dans l’élément "div.message"
if(isset($_GET["message"])){
    $message=$_GET["message"];
}


?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <link href='https://fonts.googleapis.com/css?family=Yatra One' rel='stylesheet'>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
        <div>
         <h2>Ajouter une activité</h2>

        </div>
        <form action="Activité.php" method="post">
            <div>
                <label>Activité</label>
            </div>
            <div style="width: 30%">
                <select style="margin: 10px;" name="nomact">
                <option></option>
                <option>Natation</option>
                <option>Randonnée</option>
                <option>Kayak</option>
                <option>Echecs</option>
                </select>
            </div>
            </div>
            <div>
                <div>
                    <label for="responsable">Responsable</label>
                </div>
                <div style="width: 30%">
                    <input style="margin: 10px;" type="text" id="responsable" name="responsable" /><br>
                </div>
            </div>
            <div>
                <div>
                    <label for="maximum">Maximum</label>
                </div>
                <div style="width: 30%">
                    <input style="margin: 10px;" type="text" id="max" name="maximum"/>
                </div>
            </div>
            
            <div class="buttons">
                <div>
                    <button class="input" name="enregistrer" type="submit" value="Soumettre" onclick="msg()">Soumettre</button>
                </div>
                <div>
                    <button class="input" name="annulé" type="reset" value="Annuler">Annuler</button>
                </div>
            </div>
            <?php if(isset($message)) { echo "<div class='message'>".$message."</div>"; } ?>
         </form>

   </body>
</html>
           