<?php

//Parametres de connexion a la base de données
$serveur = "localhost";
$database = "formation_db";
$user = "root";
$pass = "";

$url = "mysql:host=$serveur;dbname=$database";

try {
    //On se connecte à la BDD
    $connexion = new PDO($url, $user, $pass);

    //En cas d'eereur on leve une exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Requete d'insertion sans preparation
    //$sqlReq = "INSERT INTO EMPLOYES(prenom,ddn,fonction,email,salaire)
    //    VALUES('Badji',2007-07-24,'RH','badji@dawm.ge',70000),
    //           ('Souly',2009-07-24,'DG','souly@dawm.ge',80000)";

    //Execution de la requete
    //$connexion->exec($sqlReq);

    //Instruction de requete parametrée
    //$sqlReq = "INSERT INTO EMPLOYES(prenom,ddn,fonction,email,salaire)
    //    VALUES(?,?,?,?,?)";

    //On prepare la requete
    //$req_preparee = $connexion->prepare($sqlReq);

    //Je passe les parametre à la requete
    //$req_preparee->bindValue(1, "Talia", PDO::PARAM_STR);
    //$req_preparee->bindValue(2, "2010-10-10", PDO::PARAM_STR);
    //$req_preparee->bindValue(3, "Secretaire", PDO::PARAM_STR);
    //$req_preparee->bindValue(4, "talia@dawm.ge", PDO::PARAM_STR);
    //$req_preparee->bindValue(5, 45000, PDO::PARAM_INT);

    //$req_preparee->execute();

    $sql = "select * from employes";

    $employes = $connexion->query($sql);

    foreach ($employes as $employe){
        echo "<h3>{$employe['prenom']} - {$employe['salaire']}</h3>";
    }


} catch (Exception $e) {
    exit($e->getMessage());
}





