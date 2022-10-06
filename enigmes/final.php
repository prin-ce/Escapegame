<!DOCTYPE html>
<html>
<head>
	<title>Escape Game</title>
	<link rel="stylesheet" type="text/css" href="../css/projet.css">
</head>

<body>

    <div id="timeElm"></div>
    <div class="container">
        <div id="quiz">
        <h1><span>E</span>nigmes partie finale <h3>vous avez 30secondes</h3><i class="far fa-question-circle"></i></h1>

        <h2 id="question"></h2>

        <h3 id="score"></h3>

        <div class="choices">
            <button id="guess0" class="btn"><p id="choice0"></p></button>
            <button id="guess1" class="btn"><p id="choice1"></p></button>                
            <button id="guess2" class="btn"><p id="choice2"></p></button>                
            <button id="guess3" class="btn"><p id="choice3"></p></button>
        </div>

        <p id="progress"></p>

        </div>
    </div>

</body>
<script type="text/javascript" src="../js/projet.js"></script>
</html>