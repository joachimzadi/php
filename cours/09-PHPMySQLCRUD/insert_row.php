<?php

//Les parametres de connexion
$serveur = "localhost";
$user = "root";
$mdp = "";
$bdName = "formation_db";

// On etabli la connexion à la base de données
$connexion = mysqli_connect($serveur, $user, $mdp, $bdName);

//Si echec de connexion
if (!$connexion) {
    //On affiche un message et on arrete le programme
    die("<h1>Connexion NOK</h1>");
}

$requete = "insert into stagiaire(prenom,salaire) 
values ('Badji',15000),
        ('Fabrice',25000),
        ('Aouakas',2000),
        ('Souly',1000),
        ('Backus',25500),
        ('Sabrine',35000),
        ('Talia',55000)
;";

if (mysqli_query($connexion, $requete)) {
    echo "<h1>Insertion OK</h1>";
} else {
    echo "<h1>Insertion NOK</h1>";
}