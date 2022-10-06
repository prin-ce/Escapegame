<?php
if(isset($_POST['login_button'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);

    //si une session est déjà "isset" avec ce visiteur, on l'informe:
    if(isset($_SESSION['loginUsername'])){
        echo "Vous êtes déjà connecté, veuillez accéder directement à l'espace membre.";
    }

	if($result == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: browse.php");
	}

}
?>