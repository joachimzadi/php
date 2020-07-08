<?php

define("MESSAGE", "Bonjour MESSAGE PHP");//Case sensitive

echo "<h1>" . MESSAGE . "</h1>";

define("MSG", "Bonjour MSG PHP", true);//Case insensitive

echo "<h1>" . MSG . "</h1>";
echo "<h1>" . mSg . "</h1>";

const UNE_CONSTANTE = "UNE CONSTANTE";
//UNE_CONSTANTE = "UNE CONSTANTE";//INTERDIT

//LES CONSTANTES MAGIQUES
echo "<h1>Nous sommes la ligne " . __LINE__ . "</h1>";
echo "<h1>Je suis le fichier " . __FILE__ . "</h1>";
echo "<h1>Je suis le repertoire " . __DIR__ . "</h1>";

function une_fonction()
{
       echo "<h1>Je suis fonction " . __FUNCTION__ . "</h1>";
}

une_fonction();

