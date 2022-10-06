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
	<title>Escape Game</title>
	<link rel="stylesheet" type="text/css" href="../css/fin.css">
</head>
<body>

	<div id="HeadBan">

        <p id="NomJeu">Escape Game : Alice au pays des merveilles</p>
        <p id="playerName"> <?php echo $userLoggedIn; ?> </p>

        <div id="Player">

            <img id="ppPlayer" src="../images/icons/pp.png"></div>

        </div>

    </div><br>

	

	<div id="MainBox"> 

		<p id="text">Félicitation, vous avez terminé tous les niveaux ! <br>
		             A une prochaine fois peut-être !</p>;

	</div>

	<div id="Pseudo"></div>

</body>
</html>