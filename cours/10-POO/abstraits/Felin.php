<?php


abstract class Felin extends Animal
{
    const CARACTERISTIQUE = "Giffes retractilles";

    function manger()
    {
        echo "<h2>Je mange de la viande</h2>";
    }

//    public function __toString()
//    {
//        return parent::__toString()."<h2> J'ai des ".self::CARACTERISTIQUE."</h2>";
//    }
}