<?php
//Nous allons démarrer la session avant toute chose
session_start() ;
if(isset($_POST['login'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    if(isset($_POST['username']) && isset($_POST['password'])) { //On verifie ici si l'utilisateur a rentré des informations
        //Nous allons mettres l'email et le mot de passe dans des variables
        $username = $_POST['username'] ;
        $password = $_POST['password'];
        $erreur = "" ;
        //Nous allons verifier si les informations entrée sont correctes
        //Connexion a la base de données
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe ="";
        $nom_base_données ="uqtr" ;
        $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
        //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $req = mysqli_query($con , "SELECT * FROM users WHERE username = '$username' AND password ='$password' ") ;
        $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
        if($num_ligne > 0)
        {
            header("Location:AcceuilAdmin.php") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page TP1-Solution
            // Nous allons créer une variable de type session qui vas contenir le nom de l'utilisateur
            $_SESSION['username'] = $username ;
        }else { //si non
           $erreur = "Nom d'utilisateur ou Mot de passe incorrect !";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Yatra One' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <script>const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
        }); </script>
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
            <form action="" method="POST" >
                <h1>Connexion</h1>
                <p> <a>veillez renseigner vos identifiants pour vous connecter </a> </p>
                <div class="col-username">
                    <div>
                        <label>Nom d'utilisateur</label>
                    </div>
                    <input class="inputformulaire" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required />
                </div>

                <div class="col-password">
                    <div>
                        <label>Mot de passe</label>
                    </div>
                    <input class="inputpassword" type="password" placeholder="Entrer le mot de passe" name="password" autocomplete="current-password" required="" id="id_password" />
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                </div>

                <div class="buttons">
                    <div>
                        <button class="input" name="login" type="login" value="login"> Login </button>
                    </div>
                    <?php
                    if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
                        echo "<p class= 'Erreur'>".$erreur."</p>"  ;
                    }
                    ?>
            </form>

        </table>
    </div>


</body>
</html>
