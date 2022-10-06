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
	<title>Problème de taille</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/EnigmeTaille.css">
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
		}
	 ?>

	<div id="main">
		<div id="text"> <!-- Indication hauteur et 20cm -->
			Quel attribut pourrait changer la hauteur de ce pied ? <br> Il faudrait qu'il ne mesure que 20cm!
		</div>
	</div>

	<form id="rep" method="POST" action=<?php 
			if (!isset($_POST['rep1']) && !isset($_POST['rep3']) && !isset($_POST['rep2']) && isset($_POST['rep4'])) {
				header("Refresh: 3; url=../script/carte.html");
			} else {
				echo '"EnigmeTaille.php"';}
	 ?> >
		<?php 
			if (!isset($_POST['rep1']) && !isset($_POST['rep3']) && !isset($_POST['rep2']) && isset($_POST['rep4'])){
				echo '<p id="correct">Bien joué, vous prenez une taille normale et pouvez avancer </p>';
			} ?>
			<input type="checkbox" name="rep1" ><label>width: 20px;</label><br>
			<input type="checkbox" name="rep2" ><label>width: 20cm;</label><br>
			<input type="checkbox" name="rep3" ><label>height: 20px;</label><br>
			<input type="checkbox" name="rep4" ><label>height: 20cm;</label><br>
			
			<input type="submit" name="Envoyer" value="Soumettre">
	</form>
</body>
</html>