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
	<title>Le Tableau</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/EnigmeTableau.css">
</head>
<body>

	<div id="HeadBan">
        <p id="NomJeu">Escape Game : Alice au pays des merveilles</p>
        <p id="playerName"> <?php echo $userLoggedIn; ?> </p>
        <div id="Player">
            <img id="ppPlayer" src="../images/icons/pp.png"></div>
        </div>
    </div><br>

	<?php 
		if (isset($_POST['reponse'])) {
			$rep = $_POST['reponse'];
		} else {
			$rep = "";
		}
	 ?>

	<div id="main">
		<div id="text">
			<p> "cartes", quel beau tableau !</p> <!-- Indice pour faire comprendre que c'est un Tableau  -->
			<p>En parlant de ça, comment pourrais-je selectionner la 2ème personne de ce tableau ?</p> <!-- Indication pour l'indice du tableau  -->
		</div>
	</div>

	<form id="rep" method="POST" action= <?php 
			if ($rep == "cartes[1]") {
				header("Refresh: 3; url=../script/snake.html"); // redirection vers la page suivante dans 5 secondes
			} else {
				echo '"EnigmeTableau.php"';}
	 ?>>
			<?php if ($rep == "cartes[1]") {
				echo '<p id="correct">bravo, le soldat vous donne un secret </p>';}
				if ($rep == "cartes[]") {
				 echo '<p id="quasi">Presque ! Veuillez préciser les parametres.</p>';
				 } ?>
			<input type="text" name="reponse" placeholder="Saisir votre réponse ici" <?php echo 'value ="'.$rep.'"' ?>/>
			<input type="submit" name="Envoyer" value="Soumettre">
	</form>
</body>
</html>