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
	<title>Le Lapin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/EnigmeLapin.css">
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
		<div id="enm">
			<p id="a">...</p>
			<p id="b">J'ai pas le temps. Demandez à votre ami l'ordinateur.</p> <!-- Texte qui va apparaitre blanc sur blanc pour le cacher au joueur -->
		</div>
		<div id="text">
			<p>On dirait qu'il veut nous dire quelque chose...</p>
			<p> Trouvez comment le faire parler</p>
		</div>
	</div>

	<form id="rep" method="POST" action=<?php 
			if ($rep == "TEMPS") {
				header("Refresh: 3; url=../script/tableau.html");
			} else {
				echo '"EnigmeLapin.php"';}
	 ?> >
			<?php if ($rep == "TEMPS") {
				echo '<p id="correct">Bravo!! vous suivez le lapin </p>';}
				?>
			<input type="text" name="reponse" placeholder="Saisir votre réponse ici" <?php echo 'value ="'.$rep.'"' ?>/>
			<input type="submit" name="Envoyer" value="Soumettre">
	</form>
	<script type="text/javascript" src="../js/lapin.js"></script>
</body>
</html>