<?php


abstract class Canin extends Animal
{

    function manger()
    {
        echo "<h2>Je mange de la viande</h2>";
    }

    function seDeplacer()
    {
        echo "<h2>Je me deplace en meute</h2>";
    }
}