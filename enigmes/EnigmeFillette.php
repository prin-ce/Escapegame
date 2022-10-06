<?php
require_once("../data/base.php");

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];

    echo "<script>userLoggedIn = '$userLoggedIn'</script>";
}
else {
    header("Location: ../register.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>La Fillette</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/EnigmeQCM2.css">
</head>
<body>

	<div id="HeadBan">
        <p id="NomJeu">Escape Game : Alice au pays des merveilles</p>
        <p id="playerName"> <?php echo $userLoggedIn; ?> </p>
        <div id="Player">
            <img id="ppPlayer" src="../images/icons/pp.png"></div>
        </div>
    </div><br>

	<div id="main">
		<p>Cheshire garde <br>la sortie</p>
	</div>

	<form id="rep" method="post" action=<?php 
			if (isset($_POST['rep1']) && isset($_POST['rep3']) && !isset($_POST['rep2']) && !isset($_POST['rep4'])) { //conditions nécessaire pour valider l'énigme
				header("Refresh: 3; url=../sortie.html");
			} else {
				echo '"EnigmeFillette.php"';}
	 ?> >
		<?php 
			if (isset($_POST['rep1']) && isset($_POST['rep3']) && !isset($_POST['rep2']) && !isset($_POST['rep4'])){
				echo '<p id="correct">Bien joué, vous sortez furtivement</p>';
			} ?>
			<input type="checkbox" name="rep1" value=""><label>#Fillette { visibility: hidden; }</label><br>
			<input type="checkbox" name="rep2" value=""><label>.Fillette { visibility: hidden; }</label><br>
			<input type="checkbox" name="rep3" value=""><label>#Fillette { opacity: 0%; }</label><br>
			<input type="checkbox" name="rep4" value=""><label>.Fillette { opacity: 0%; }</label><br>
		
			<input type="submit" name="Envoyer" value=<?php 
			if (isset($_POST['rep1']) && isset($_POST['rep3']) && !isset($_POST['rep2']) && !isset($_POST['rep4'])) {
					echo '"Niveau Suivant"';
				} else {
					echo '"Soumettre"';
				}
			 ?> >
	</form>
	<script type="text/javascript" src="../js/lapin.js"></script>
</body>
</html>