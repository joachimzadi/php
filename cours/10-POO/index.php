<?php

require_once "Fruit.php";

$nom = "Joachim";
//var_dump($nom);
echo "<h1>{$nom}</h1>";
$age = 52;
//var_dump($age);
echo "<h1>{$age}</h1>";

//$fruit = new Fruit();
//var_dump($fruit);
//echo  "$fruit";

//$pomme = new Fruit();//Je cree une instance de pomme
//$pomme->setNom("Pomme");
//$pomme->setCouleur("Verte");
//var_dump($pomme);

//$pomme = new Fruit("Pomme", "Verte");

//On ne peut pas acceder aux attributs privés depuis l'exterieur de la classe
//echo "<h1>nom = {$pomme->nom}</h1>";
//echo "<h1>coleur = {$pomme->couleur}</h1>";
//echo "<h1>{$pomme}</h1>";
//echo "<h1>{$pomme->getCouleur()}</h1>";

//$orange = new Fruit("Orange", "Orange");
//echo "<h1>{$orange->getNom()}</h1>";
//echo "<h1>{$orange}</h1>";

//$orange->setNom("Mangue");
//echo "<h1>{$orange->getNom()}</h1>";

//echo $orange;


require_once "./abstraits/Animal.php";
require_once "./abstraits/Felin.php";
require_once "./abstraits/Lion.php";
require_once "./abstraits/Chat.php";

//$animal = new Animal();
//$animal->setPoids(23);

//$animal = new Animal(23, "Grise");//Erreur car la classe Animal est abstraite
//var_dump($animal);

//$felin = new Felin();
//var_dump($felin);

$lion = new Lion(250, "Blanc");
//$lion->boire();
//$lion->manger();
//$lion->seDeplacer();
echo $lion->__toString();
echo $lion->crier();
echo "<h2>" . Lion::$nombre . "</h2>";

$chat = new Chat(3, "Tigré");
//$chat->boire();
//$chat->manger();
//$chat->seDeplacer();
echo $chat;
//echo Chat::CARACTERISTIQUE;//Accès à la constante depuis l'exterieur
echo "<h2>" . Chat::$nombre . "</h2>";

$milou = new Chat(5,"Noir");
echo "<h2>" . Chat::$nombre . "</h2>";