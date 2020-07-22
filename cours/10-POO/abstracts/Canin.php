<?php
require_once "Animal.php";

abstract class Canin extends Animal
{
    private const GRIFFE = "J'ai des griffres retractiles non retractiles";

    function manger()
    {
        echo "<h2>Je mange de la viande</h2>";
    }

    function getGriffre()
    {
        return self::GRIFFE;
    }

    function seDeplacer()
    {
        echo "<h2>Je me deplace en meute familiale</h2>";
    }
}
