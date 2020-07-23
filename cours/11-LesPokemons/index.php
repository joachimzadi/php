<?php
//ON TEST NOTRE CODE ICI
require_once "classes/Pokemon.php";
require_once "classes/PokemonTerrestre.php";
require_once "classes/PokemonSportif.php";

use Dawm\Concrets\PokemonSportif;

$sportif = new PokemonSportif("Zizou", 70.5, 2, 1.96, 113.9);
echo $sportif;