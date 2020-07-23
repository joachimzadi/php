<?php


namespace Dawm\Concrets;

use Dawm\Abstraits\PokemonTerrestre;

class PokemonSportif extends PokemonTerrestre
{
    /**
     * @var float
     */
    private $freqCardiaque;

    public function __construct(string $nom, float $poids, int $nbPatte, float $taille, float $freqCardiaque)
    {
        parent::__construct($nom, $poids, $nbPatte, $taille);
        $this->freqCardiaque = $freqCardiaque;
    }

    public function __toString()
    {
        $affichage = "<br>Ma frequence cardiaque est $this->freqCardiaque pulsation/min";
        return "<h4>" . parent::__toString() . $affichage . "</h4>";
    }
}