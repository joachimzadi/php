<?php


namespace Dawm\Abstraits;


abstract class Pokemon
{
    /**
     * @var string
     */
    private $nom;
    /**
     * @var float
     */
    private $poids;

    /**
     * Pokemon constructor, permet d'initialiser un Pokemon à partir de son nom et son poids passés en arg
     * @param string $nom
     * @param float $poids
     */
    protected function __construct(string $nom, float $poids)
    {
        $this->nom = $nom;
        $this->poids = $poids;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPoids(): float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): void
    {
        $this->poids = $poids;
    }

    abstract protected function getVitesse(): float;

    public function __toString()
    {
        $affichage = "Je suis le Pokemon $this->nom<br>" .
            "Mon poids est $this->poids kg" .
            "<br>Ma vitesse est {$this->getVitesse()} km/h";
        return $affichage;
    }
}