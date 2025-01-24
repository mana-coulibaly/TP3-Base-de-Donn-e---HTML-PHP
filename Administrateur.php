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
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <link href='https://fonts.googleapis.com/css?family=Yatra One' rel='stylesheet'>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <title>TP3 INF1001</title>
        <div>
            <h3>Détails des activités</h3>
        </div>
        <div class="divphp" > 
            <div class="divi3Admin">
                <table class="tablephp">
                    <thead>
                    <tr>
                        <th class="th idcolumn">id</th>
                        <th class="th">Activité</th>
                        <th class="th">Responsable</th>
                        <th class="th">Nombre de places</th>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                    <!-- Récupération de la liste des exercices  -->
                    <?php
                    $sql = "SELECT * FROM activité";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Parcourir les lignes de résultat

                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr align='center'><td> " . $row["Id"]. "</td><td>" . $row["nomact"]. "</td><td>" . $row["responsable"]."</td><td>" . $row["maximum"]
                                ."</td><td><a href=\"Supp_Activité.php?id=".$row["Id"]."\" onclick=\"return confirm('Vous voulez vraiment supprimer cet exercice')\"><button class=\"supprimer\"> Supprimer</a></td></tr>";
                        }

                        // Le lien Supprimer envoie vers la page Supp_Activité.php avec l'id de l'activité
                        // L'attribut "onclick" fait appel à la fonction confirm() afin de permettre à l'utilisateur de valider l'action de suppression.

                    }
                    ?>
                    </tbody>

            </table>
        </div>
            <div class="divbuttons">
                <div class="marginbottom">
                    <a href="TP1-Solution.html"><button class="deconnecter" type="button">Déconnexion</button></a>
                </div>
                <div >
                    <a href="Activité.php"> <button class="activite" type="button">+Ajouter une nouvelle activité</button></a>
                </div>
            </div>
        </div>

      <br>
      <br>
      <br>

          <table class="table2php">
              <tr>	<td align="center"> Nom</td>
                  <td align="center"> Places restantes</td>
                  <td align="center"> Pourcentage </td> </tr>
              <tr>	<td align="center"> Randonnée </td>
                  <td align="center"> 17 </td>
                  <td class="text-center ft-weight">
                      <div class="rt-container">
                          <div class="radialProgressBar progress-80">
                              <div class="overlay">85%</div>
                          </div>
                      </div>

                                 </td> </tr>
              <tr>	<td align="center"> Badminton</td>
                  <td align="center"> 0</td>
                  <td class="text-center ft-weight">
                      <div class="rt-container">
                          <div class="radialProgressBar progress-0">
                              <div class="overlay">0%</div>
                          </div>
                      </div>

                                 </td> </tr>
              <tr>	<td align="center"> Kayak</td>
                  <td align="center"> 17</td>
                  <td class="text-center ft-weight">
                      <div class="rt-container">
                          <div class="radialProgressBar progress-80">
                              <div class="overlay">85%</div>
                          </div>
                      </div>

                                 </td> </tr>
              <tr>	<td align="center"> Vélo</td>
                  <td align="center"> 0</td>
                  <td class="text-center ft-weight">
                      <div class="rt-container">
                          <div class="radialProgressBar progress-0">
                              <div class="overlay">0%</div>
                          </div>
                      </div>

                                 </td> </tr>

          </table>



   </body>
</html>


