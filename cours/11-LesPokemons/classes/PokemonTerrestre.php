<?php


namespace Dawm\Abstraits;


abstract class PokemonTerrestre extends Pokemon
{
    /**
     * @var int
     */
    private $nbPatte;
    /**
     * @var float
     */
    private $taille;

    protected function __construct(string $nom, float $poids, int $nbPatte, float $taille)
    {
        parent::__construct($nom, $poids);
        $this->nbPatte = $nbPatte;
        $this->taille = $taille;
    }

    /**
     * @return int
     */
    public function getNbPatte(): int
    {
        return $this->nbPatte;
    }

    /**
     * @return float
     */
    public function getTaille(): float
    {
        return $this->taille;
    }

    /**
     * @param float $taille
     */
    public function setTaille(float $taille): void
    {
        $this->taille = $taille;
    }

    protected function getVitesse(): float
    {
        return 3 * $this->nbPatte * $this->taille;
    }

    public function __toString()
    {
        $affichage = "<br>J'ai $this->nbPatte pattes" . "<br>Ma taille est $this->taille m";
        return parent::__toString() . $affichage;
    }
}