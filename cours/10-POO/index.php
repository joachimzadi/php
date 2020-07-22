<?php
require_once "./abstracts/Animal.php";
require_once "./abstracts/Felin.php";
require_once "./abstracts/Canin.php";
require_once "./concretes/Chat.php";
require_once "./concretes/Lion.php";
require_once "./concretes/Lion.php";
require_once "./concretes/Loup.php";

//$animal = new Animal("Jaune", 250);//==> Erreur car abstracts

//echo $animal->__toString();

//$felin = new Felin("Mauve", 250);//==> Car abstract
//$felin->boire();
//echo "<br>";
//$felin->manger();

$chat = new Chat("Gris", 4);
echo $chat->__toString();
echo Chat::GRIFFE."<br>";
echo Chat::getCompteur();

$lion = new Lion("Mauve", 250);
echo $lion->__toString();
echo Lion::GRIFFE."<br>";
echo Lion::getCompteur();

$loup = new Loup("Noir", 30);
echo $loup->__toString();
echo $loup->getGriffre()."<br>";
echo Loup::getCompteur();
