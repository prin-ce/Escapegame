<?php
require_once("data/base.php");
require_once("classes/User.php");
require_once("classes/Fonctions.php");
require_once("classes/Erreurs.php");
require_once("updateDetails.php");

$detailsMessage = "";
$passwordMessage = "";

if(!isset($_SESSION["userLoggedIn"])) {
    header("Location: register.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];

?>

<html>
<head>
	<title>Profil</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<!-- Ajax et JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/script.js"></script>
</head>

<body>


    <div class="settingsContainer column">

        <div class="formSection">

            <form method="POST">
                <h2>Mes informations :</h2>

                <?php
                $user = new User($connexion, $userLoggedIn);

                $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : $user->getFirstName();
                $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : $user->getLastName();
                $email = isset($_POST["email"]) ? $_POST["email"] : $user->getEmail();
                ?>

                <input type="text" name="firstName" placeholder="Prénom" value="<?php echo $firstName; ?>">
                <input type="text" name="lastName" placeholder="Nom" value="<?php echo $lastName; ?>">
                <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">

                <div class="message">
                    <?php echo $detailsMessage; ?>
                </div>

                <input type="submit" name="saveDetailsButton" value="Mettre à jour">


            </form>

        </div>

        <div class="formSection">

            <form method="POST">

                <h2>Modifier le mot de passe</h2>

                <input type="password" name="oldPassword" placeholder="Ancien mot de passe">
                <input type="password" name="newPassword" placeholder="Nouveau mot de passe">
                <input type="password" name="newPassword2" placeholder="Confirmation">

                <div class="message">
                    <?php echo $passwordMessage; ?>
                </div>

                <input type="submit" name="savePasswordButton" value="Modifier">


            </form>

        </div>

        <div class="fin">

            <form method="POST">

                <input type="submit" name="closeAccountButton" style="background-color: red" value="Supprimer">
                <input type="submit" name="returnButton" style="background-color: deepgreen" value="Retour">

            </form>

        </div>

    </div>

</body>

</html>