<?php
require_once("data/base.php");
require_once("classes/Fonctions.php");
require_once("classes/Erreurs.php");

$account = new Fonctions($connexion);
$detailsMessage = "";

$userLoggedIn = $_SESSION["userLoggedIn"];

if (isset($_POST["non"])) {
    header("Location: profil.php");
}

if (isset($_POST["oui"])) {
    $close_query = mysqli_query($connexion, "DELETE FROM users WHERE username='$userLoggedIn'");
    unset($_SESSION["userLoggedIn"]); //on tue la session avec unset()
    $detailsMessage = "<div class='alertSuccess'>
                                Votre compte vient d'être supprimé définitivement!
                            </div>";
    header("Location: register.php");
}

?>

<html>
<head>
    <title>Profil</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Ajax et JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>

    <div class="settingsContainer column">

        <div class="formSection">

            <h2>Supprimer votre compte</h2>

            <p>Voulez-vous vraiment supprimer votre compte ?</p>
            <p>Cette action est irréversible</p>

            <form method="POST">

                <input type="submit" style="background-color: red" name="oui" value="Oui!">
                <input type="submit"  name="non" value="Non!">

            </form>

        </div>

    </div>

</body>

</html>