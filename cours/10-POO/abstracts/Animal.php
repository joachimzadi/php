<?php

abstract class Animal
{

    /**
     * @var string
     */
    private $couleur;
    /**
     * @var int
     */
    private $poids;

    private static $compteur;

    public function __construct(string $couleur, int $poids)
    {
        $this->couleur = $couleur;
        $this->poids = $poids;
        self::$compteur++;
    }

    /**
     * @return string
     */
    public function getCouleur(): string
    {
        return $this->couleur;
    }

    /**
     * @param string $couleur
     */
    public function setCouleur(string $couleur): void
    {
        $this->couleur = $couleur;
    }

    /**
     * @return int
     */
    public function getPoids(): int
    {
        return $this->poids;
    }

    /**
     * @param int $poids
     */
    public function setPoids(int $poids): void
    {
        $this->poids = $poids;
    }

    abstract function manger();

    /**
     * @return mixed
     */
    public static function getCompteur()
    {
        return self::$compteur;
    }

    function boire()
    {
        echo "Je bois de l'eau";
    }

    abstract function seDeplacer();

    abstract public function crier();

    public function __toString()
    {
        return "<h2>Je suis un " . get_class($this) . "<br>Je suis de couleur $this->couleur<br>Le pese $this->poids kg</h2>";
    }
}