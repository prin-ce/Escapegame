<?php
	// Inclusion des fichiers
	require_once("data/base.php");
	require_once("classes/Fonctions.php");
	require_once("classes/Erreurs.php");

	$account = new Fonctions($connexion);

	require_once("data/inscription.php");
	require_once("data/connexion.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>


<html>
<head>
	<title>Entre dans la légende</title>
	<link rel="stylesheet" type="text/css" href="css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/register.js"></script>
</head>
<body>

    <?php  

    if(isset($_POST['register_button'])) {
        echo '
        <script>

        $(document).ready(function() {
            $("#first").hide();
            $("#second").show();
        });

        </script>

        ';
    }

    ?>

	<div class="wrapper">

		<div class="login_box">

			<div class="login_header">
				<h1>Bienvenue!</h1>
				Connecte ou inscris toi en dessous!
			</div>
			<br>
			<div id="first">

                <form id="loginForm" action="register.php" method="POST">
                    <br>
                    <?php echo $account->getError(Erreurs::$loginFailed); ?>
                    <input id="loginUsername" name="loginUsername" type="text" placeholder="Pseudo" value="<?php getInputValue('loginUsername') ?>" required>
					
					<br>
                    <input id="loginPassword" name="loginPassword" type="password" placeholder="Mot de passe" required>
					
                    <br>
					<input type="submit" name="login_button" value="Connexion">

                    <br>
					<div class="hasAccountText">
						<a href="#" id="signup" class="signup">Pas encore de compte? L'inscription c'est par ici.</a>
					</div>

				</form>

			</div>

			<div id="second">

            <form id="registerForm" action="register.php" method="POST">
					<br>
                    <?php echo $account->getError(Erreurs::$usernameCharacters); ?>
                    <?php echo $account->getError(Erreurs::$usernameTaken); ?>
                    <input id="username" name="username" type="text" placeholder="Pseudo" value="<?php getInputValue('username') ?>" required>
					
					<br>
                    <?php echo $account->getError(Erreurs::$firstNameCharacters); ?>
                    <input id="firstName" name="firstName" type="text" placeholder="Prénom" value="<?php getInputValue('firstName') ?>" required>
					
					<br>
                    <?php echo $account->getError(Erreurs::$lastNameCharacters); ?>
                    <input id="lastName" name="lastName" type="text" placeholder="Nom" value="<?php getInputValue('lastName') ?>" required>					

					<br>
                    <?php echo $account->getError(Erreurs::$emailsDoNotMatch); ?>
                    <?php echo $account->getError(Erreurs::$emailInvalid); ?>
                    <?php echo $account->getError(Erreurs::$emailTaken); ?>
                    <input id="email" name="email" type="email" placeholder="Email" value="<?php getInputValue('email') ?>" required>
					
					<br>
                    <input id="email2" name="email2" type="email" placeholder="Confirmation d'email" value="<?php getInputValue('email2') ?>" required>					

					<br>
                    <?php echo $account->getError(Erreurs::$passwordsDoNoMatch); ?>
                    <?php echo $account->getError(Erreurs::$passwordNotAlphanumeric); ?>
                    <?php echo $account->getError(Erreurs::$passwordCharacters); ?>
                    <input id="password" name="password" type="password" placeholder="Mot de passe" required>					

					<br>
                    <input id="password2" name="password2" type="password" placeholder="Confirmation de mot passe" required>
					
                    <br>
					<input type="submit" name="register_button" value="Inscription">

                    <br>
					<div class="hasAccountText">
						<a href="#" id="signin" class="signin">Déjà membre? Connecte-toi.</a>
					</div>
					
				</form>
			</div>

		</div>

	</div>


</body>
</html>