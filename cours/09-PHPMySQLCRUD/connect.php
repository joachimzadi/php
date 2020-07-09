<?php
//Pour se connecter à une BDD, on va utiliser les fonctions :
// mysqli_connect
// PDO::__construct

//Les parametres de connexion
$serveur = "localhost";
$user = "root";
$mdp = "";

//On effectue la connexion
$connexion = mysqli_connect($serveur, $user, $mdp);

//Si echec de connexion
if (!$connexion) {
    //On affiche un message et on arrete le programme
    die("<h1>Connexion NOK</h1>");
}

//On affiche ce message en cas de succes
echo "<h1>Connexion OK</h1>";

//Pour executer des requetes on utilise les fonctions
// msqli_query
// PDO::__query

$requete = "create database if not exists formation_db;";

if (!mysqli_query($connexion, $requete)) {
    die("<h1>Creation de la DBB NOK</h1>");
}
echo "<h1>Creation de la DBB OK</h1>";

//On ferme la connexion
mysqli_close($connexion);
