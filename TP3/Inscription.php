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
//Après clic sur le bouton "Soummetre" envoie de données par post
if(count($_POST)>2) {
    //récupération et protection des données envoyées
    $nom = mysqli_real_escape_string($conn,$_POST["nom"]);
    $prenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $sexe = mysqli_real_escape_string($conn, $_POST["sexe"]);
    $activité = mysqli_real_escape_string($conn, $_POST["activité"]);
    $motivation = mysqli_real_escape_string($conn, $_POST["motivation"]);
    $sql = "INSERT INTO inscription (nom, prenom, date_nais, sexe, activité, motivation)
	VALUES ('{$nom}', '{$prenom}', '{$date}','{$sexe}','{$activité}','{$motivation}')";
    //exécuter la requête d'insertion
    if (mysqli_query($conn, $sql)) {

        // JavaScript dans le code php qui montre que montre que l'enregistrement a ete effectué avec succes
        echo '<script type="text/javascript">
                alert(\'Inscription réussie\');
              </script>'
        ;

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

      <title>Inscription</title>
      <div class="divi1">
         <table class="tbl1">
            <tr>
               <td><img src="uqtr.png" alt="uqtr" width="40%" height="auto"></td>
               <td>
                  <h1 align ="right" style="font-family: Yatra One; position: relative;">Loisir pour les étudiant!</h1>
               </td>
            </tr>
         </table>
      </div>
   <div class="div2-div3">
      <div class="divi2">
            <ul class="liststyle">
               <li><a href="TP1-Solution.html">Accueil</a>
                  <ul class="sous-menu">
                     <li><a href="https://www.google.ca/maps/@46.350306,-72.5843968,14z">Localiser une activité</a></li>
                  </ul>
               </li>
               <li><a href="Inscription.php">S'inscrire</a>
                  <ul>
                     <li><a href="Authentification.php">Autentification</a></li>
                  </ul>
               </li>
            </ul>
      </div>



      <div class="divi3">
         <table class="tbl3">

            <h2> Inscriver vous </h2>

             <?php if(isset($message)) { echo "<div class='message'>".$message."</div>"; } ?>

            <form action="Inscription.php" method="post">

               <div>
                  <div>
                     <label for="nom"> Nom </label>
                  </div>
                  <div class="col-75">
                     <input class="inputformulaire" type="text" id="nom" name="nom" />
                     <p> Merci d'entrer un nom</p>
                  </div>
               </div>
               <div>
                  <div>
                     <label for="prenom"> Prénom </label>
                  </div>
                  <div class="col-75">
                     <input class="inputformulaire" type="text" id="prenom" name="prenom" />
                     <p> Merci d'entrer un prénom</p>
                  </div>
               </div>
               <div>
                  <div>
                        <label for="date" > Date de naissance </label>
                  </div>
                  <div class="col-75">
                        <input class="inputformulaire" type="date" id="date" name="date" required placeholder="DD/MM/YYYY"/>
                        <p> Merci d'entrer votre date de naissance</p>
                  </div>
               </div>
               <div>
                  <div>
                     <label > Sexe </label>
                  </div>
                  <div class="col-75">
                     <input type="radio" id="M" name="sexe" value="M" >
                     <label for="M">Masculin</label>
                     <input type="radio" id="F" name="sexe" value="F">
                     <label for="F"> Femme </label>
                  </div>
               </div>
               <div>
                  <div>
                     <label>Activité</label>
                  </div>
                  <div class="col-75">
                     <select style="margin: 10px;" name="activité">
                        <option></option>
                        <option>Natation</option>
                        <option>Randonnée</option>
                        <option>Kayak</option>
                        <option>Echecs</option>
                        
                     </select>
                     <p>Veuillez choisir une activité</p>
                  </div>
               </div>
               <div>
                  <div>
                     <label for="motivation"> Motivation </label> <br>
                  </div>
                  <div class="col-75">
                     <textarea style="width: 50%; margin: 5px;" name="motivation" id="motivation"></textarea> <br>
                  </div>
               </div>
               <div class="buttons">
                  <div>
                     <button class="input" name="ajouter" type="submit" value="Soumettre" onclick="msg()">Soumettre</button>
                  </div>
                  <div>
                     <button  class="input" name="Rest" type="reset" value="Réinitialiser">Réinitialiser</button>
                  </div>
               </div>
         </form>


         </table>
      </div>
   </div>   
      
   </body>
</html>