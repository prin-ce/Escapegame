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
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Petits Jeux</title>
    <link rel="stylesheet" type="text/css" href="../css/snake.css">
  </head>

  <body>

    <div id="HeadBan">
        <p id="NomJeu">Escape Game : Alice au pays des merveilles</p>
        <p id="playerName"> <?php echo $userLoggedIn; ?> </p>
        <div id="Player">
            <img id="ppPlayer" src="../images/icons/pp.png"></div>
        </div>
    </div><br>

    <h1> Echappez vous de la prison de la Reine </h1>

    <div id="reponses">
      <span id="reponse1"></span>
      <span id="reponse2"></span>
      <span id="reponse3"></span>
    </div>

    <div id="plateau"></div>

    <div id="boite_enigme">
      <span id="probleme"></span>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="../js/snake.js"></script>

  </body>

</html>
