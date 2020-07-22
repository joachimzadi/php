<?php
require_once "Animal.php";

abstract class Felin extends Animal
{
    const GRIFFE = "J'ai des griffres retractiles";

    function manger()
    {
        echo "Je mange de la viande";
    }

    abstract function seDeplacer();
}