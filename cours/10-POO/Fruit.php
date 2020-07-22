<?php

class Fruit
{

    //Attributs ou proprietes
    //J'encapsule avec le mot cle private
    private $nom;
    private $couleur;

    /**
     * Fruit constructor.
     * @param $nom
     * @param $couleur
     */
    public function __construct($nom, $couleur)
    {
        $this->nom = $nom;
        $this->couleur = $couleur;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

//    /**
//     * @param mixed $nom
//     */
//    public function setNom($nom): void
//    {
//        $this->nom = $nom;
//    }

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @param mixed $couleur
     */
    public function setCouleur($couleur): void
    {
        $this->couleur = $couleur;
    }

    public function __toString()
    {
        return "Je suis le fruit {$this->nom} et de couleur {$this->couleur}";
    }
}