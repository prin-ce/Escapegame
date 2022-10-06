<?php
require_once("data/base.php");

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];

    /**
     * on va utiliser la variable userLoggedIn dans toutes nos pages
     * donc on appelle la variable en javascript
     **/
    echo "<script>userLoggedIn = '$userLoggedIn'</script>"
?>

<!DOCTYPE html>
<html>
<head>
	<title>Escape Game</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

    <div id="HeadBan">
        <p id="NomJeu">Escape Game : Alice au pays des merveilles</p>
        <p id="playerName"> <?php echo $userLoggedIn; ?> </p>
        <div id="Player">
            <a href="profil.php"><img id="ppPlayer" src="images/icons/pp.png"></div></a>
        </div>
    </div>

    <div class="mainContent">

        <div class="label">Que voulez-vous faire ?</div>

        <ul class="actions">

            
            <li class="play">
                <div>
                    <a href="debut.html"><img src="images/icons/groupe.png">Joindre une équipe</a>
                </div>
            </li>

            <li class="play">
                <div>
                    <a href="debut.html"><img src="images/icons/solo.png">Jouer seul</a>
                </div>
            </li>

        </ul>

        <ul class="actions">

            <li class="managment">
                <div>
                    <a href="data/logout.php"><img src="images/icons/logout.png" style="width:70px"></a>
                </div>
            </li>

        </ul>

    </div>

</body>
</html>
<?php
}
else {
    header("Location: register.php");
}
?>