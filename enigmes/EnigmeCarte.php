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
	<title>La Carte</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/EnigmeCarte.css">
</head>
<body>

	<div id="HeadBan">
        <p id="NomJeu">Escape Game : Alice au pays des merveilles</p>
        <p id="playerName"> <?php echo $userLoggedIn; ?> </p>
        <div id="Player">
            <img id="ppPlayer" src="../images/icons/pp.png"></div>
        </div>
    </div><br>

 	<!-- Afin d'initialiser la variable selon sa derniere valeure saisie -->
	<?php 
		if (isset($_POST['reponse'])) {
			$rep = $_POST['reponse'];
		} else {
			$rep = "";
		}
	 ?>

	<div id="main">
		<p>Alice aimerait choisir une des 52 cartes aléatoirement, avec quelle fonction php pourrait-elle procéder ? </p>
		<p>(précisez les parametres de cette fonction)</p>
	</div>

	<form id="rep" method="POST" action= <?php 
			if ($rep == "rand(1,52)") { //cas de la bonne réponse
				header("Refresh: 3; url=../script/lapin.html"); // redirection vers la page suivante dans 5 secondes
			} else { //renvoi la même page si la réponse est incorrect
				echo '"EnigmeCarte.php"';}
	 ?> >
			<?php if ($rep == "rand(1,52)") {
				echo '<p id="correct">Bonne réponse, la carte choisie se transforme !</p>';}
				if ($rep == "rand()") { //petite aide supplémentaire à la question si jamais la personne est sur la bonne voie
				 echo '<p id="quasi">Presque ! Veuillez préciser les parametres.</p>';
				 } ?>
			<input type="text" name="reponse" placeholder="Saisir votre réponse ici" <?php echo 'value ="'.$rep.'"' ?>/>
			<input type="submit" name="Envoyer" value="Soumettre">
			
	</form>
</body>
</html>
