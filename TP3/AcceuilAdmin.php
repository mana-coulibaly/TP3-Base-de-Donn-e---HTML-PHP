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
<title>TP1 INF1001</title>


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
            <li><a href="AcceuilAdmin.php">Accueil</a>
                <ul class="sous-menu">
                    <li><a href="https://www.google.ca/maps/@46.350306,-72.5843968,14z">Localiser une activité</a></li>
                </ul>
            </li>
            <li><a href="Inscription.php">S'inscrire</a>
                <ul>
                    <li><a href="Administrateur.php">Administrateur</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="divi3">
        <table class="tbl3">
            <h2>Notre but:</h2>
            <p>Notre site propose aux étudiants désireux de réaliser une ou plusieurs activités de loisir de rejoindre les différentes activités proposées dans la liste suivantes en 3 étapes</p>
            <ul>
                <li>S'inscrire</li>
                <li>Choisir une ou plusieurs activités</li>
                <li>Commencer les activités en groupe</li>
            </ul>
            <p>Les différences activités des groupes sont la responsabilité des professionnelles. Il s'agit de passionnés de domaine qui vous feront découvrir des pans inédits de vos loisirs préfère. Qu'attendez-vous...?. Rejoignez-nous!</p>
            <h2>Liste des activités disponibles</h2>
            <tr class="trg">
                <thead>
                <tr>
                    <th class="th idcolumn">#</th>
                    <th class="th">Activité</th>
                    <th class="th">Responsable</th>
                    <th class="th">Nombre d'inscrits</th>
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
                        echo "<tr><td> " . $row["Id"]. "</td><td>" . $row["nomact"]. "</td><td>" . $row["responsable"]."</td><td>" . $row["maximum"]
                            ."</td></tr>";
                    }

                    // Le lien Supprimer envoie vers la page Supp_Activité.php avec l'id de l'activité
                    // L'attribut "onclick" fait appel à la fonction confirm() afin de permettre à l'utilisateur de valider l'action de suppression.

                }
                ?>
                </tbody>

        </table>
    </div>
</div>

</body>
</html>