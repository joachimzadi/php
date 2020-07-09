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

$requete = "create table if not exists stagiaire(
    id int auto_increment,
    prenom  varchar(20) not null ,
    salaire int not null ,
    constraint pk_stagiaire primary key (id)
);";

if (mysqli_query($connexion, $requete)) {
    echo "<h1>Creation de la table stagiaire OK</h1>";
} else {
    echo "<h1>Creation de la table stagiaire NOK</h1>";
}

//On ferme la connexion
mysqli_close($connexion);