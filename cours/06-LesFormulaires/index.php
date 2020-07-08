<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form GET</title>
</head>
<body>
<form method="post">
    <p>
        <label for="prenom">Prenom</label>
        <input id="prenom" type="text" name="prenom"/>
    </p>
    <p>
        <label for="age">Âge</label>
        <input type="number" name="age"/>
    </p>
    <p>
        <input type="submit" value="Valider"/>
    </p>
</form>
</body>
</html>

<?php

//echo "<h1>Bonjour " . $_GET['prenom'] . ", Vous avez " . $_GET['age'] . " ans</h1>";
echo "<h1>Bonjour " . $_POST['prenom'] . ", Vous avez " . $_POST['age'] . " ans</h1>";