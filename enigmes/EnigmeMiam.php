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
	<title>Miam</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/EnigmeQCM1.css">
</head>
<body>

	<div id="HeadBan">
        <p id="NomJeu">Escape Game : Alice au pays des merveilles</p>
        <p id="playerName"> <?php echo $userLoggedIn; ?> </p>
        <div id="Player">
            <img id="ppPlayer" src="../images/icons/pp.png"></div>
        </div>
    </div><br>

	<!-- Enigme special exam Web -->
	<div id="main">
		<p>Comment faire pour <br> ingérer les deux<br>à la suite ?</p>
		<h4>(en PHP)</h4>
	</div>

	<form id="rep" method="post" action=<?php 
			if (isset($_POST['Send']) && empty($_POST['rep'])) {
				header("Refresh: 3; url=../script/taille.html");
			} else {
				echo '"EnigmeMiam.php"';}
	 ?> >
		<?php if (isset($_POST['Send']) && !empty($_POST['rep'])){
			echo '<p id="faux">Non :)</p>';
			}
			if (isset($_POST['Send']) && empty($_POST['rep'])){
				echo '<p id="correct">Bravo, vous pouvez entrer dans le Pays des Merveilles</p>';
			} ?>

			<input type="checkbox" name="rep[]" value="$Drink + $Eat"><label>"$Drink + $Eat"</label><br>
			<input type="checkbox" name="rep[]" value="$Drink , $Eat"><label>"$Drink , $Eat"</label><br>
			<input type="checkbox" name="rep[]" value="$Drink = $Eat"><label>"$Drink = $Eat"</label><br>
			<input type="checkbox" name="rep[]" value="$Drink * $Eat"><label>"$Drink * $Eat"</label><br>
		
			<input type="submit" name="Send" value=<?php 
			if (isset($_POST['Send'])) {
				if (empty($_POST['rep'])) { //petite référence à l'exam, aucune réponse a séléctionner.
					echo '"Niveau Suivant"';
				} else echo '"Soumettre"';}
			else { echo '"Soumettre"';}
			 ?> >
	</form>
	<script type="text/javascript" src="../js/lapin.js"></script>
</body>
</html>