<?php

$nom_de_la_variable = "valeur de la variable";
$couleur = "Rose";
$_b = 50; // Valid
//$-b=50;//Non valide
//$0p=78//Nom valide
$p0 = 62;//Valide
//$p-0="valeur"//Non valid
$p_0 = false;//Valide

//Le PHP est langage faiblement typé

//locale
//Globale
//static

function variable_locale()
{
    $somme = -25;
    echo "La variable somme est dit locale";
}

//echo $somme;//Non definie

$prenom = "Talia Toulepi";

function variable_globale()
{
    //echo "Bonjour".$prenom;//Viable inaccessible
    global $prenom;
    echo "Bonjour " . $prenom;
}

//echo $prenom; //Valide

$nombre01 = 15;
$nombre02 = 5;

function autre_variable_globale()
{
    $somme = $GLOBALS["nombre01"] + $GLOBALS["nombre02"];
    echo $somme;
}

$stagiaire = "Badji";

function priorite()
{
    $stagiaire = "Aouakas";
    echo $stagiaire;
}

function variable_static()
{
    static $nb1 = 1;
    $nb2 = 1;

    $nb1++;
    $nb2++;

    echo "Static " . $nb1;
    echo "<br>";
    echo "Non-Static " . $nb2;
}

$x = "abc";
$$x = 200;


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les variables</title>
</head>
<body>
<!--<h1>--><?php //echo $nom_de_la_variable; ?><!--</h1>-->
<!--<h1>--><?php //echo $couleur; ?><!--</h1>-->
<!--<h1>--><?php //echo "Les noms des variables sont sensibles à la casse" ?><!--</h1>-->
<!--<h1>--><?php //variable_locale(); ?><!--</h1>-->
<!--<h1>--><?php //variable_globale(); ?><!--</h1>-->
<!--<h1>--><?php //autre_variable_globale(); ?><!--</h1>-->
<!--<h1>--><?php //priorite(); ?><!--</h1>-->
<!--<h1>--><?php //echo $stagiaire?><!--</h1>-->
<!--<h1>--><?php //variable_static(); ?><!--</h1>-->
<!--<h1>--><?php //variable_static(); ?><!--</h1>-->
<!--<h1>--><?php //variable_static(); ?><!--</h1>-->
<!--<h1>--><?php //variable_static(); ?><!--</h1>-->
<!--<h1>--><?php //variable_static(); ?><!--</h1>-->
<h1><?php echo $x ?></h1>
<h1><?php echo $$x ?></h1>
<h1><?php echo $abc ?></h1>
</body>
</html>
