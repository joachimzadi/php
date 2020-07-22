<?php


abstract class Animal
{
    private $poids;
    private $couleur;
    public static $nombre;

    public function __construct(int $poids, string $couleur)
    {
        $this->poids = $poids;
        $this->couleur = $couleur;
        self::$nombre++;
    }

    public function boire(){
        echo "<h2>Je bois de l'eau</h2>";
    }

    abstract protected function manger();//Methode abstraite --> Classe abstraite
    abstract protected function seDeplacer();
    abstract protected function crier();

    public function __toString()
    {
        return "<h2>Je suis un ".get_class($this)."<br>Je pese $this->poids kg<br>Ma couleur est $this->couleur</h2>";
    }
}