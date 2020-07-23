<?php

try {
    $database = "formation_db";
    $user = "root";
    $pass = "";
    $table = "employes";
    $url = "mysql:host=127.0.0.1;dbname=$database";

    //Connexion à la base de données
    $connexion = new PDO($url, $user, $pass);

    # générer des exceptions en cas d'erreur
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Script de creation de la table
    $sql = "create table if not exists Employes(
        id      int auto_increment not null,
        prenom  varchar(50)        not null,
        ddn     date,
        titre   varchar(25)        not null,
        email   varchar(50)        not null,
        salaire int                not null,
        constraint pk_employe primary key (id),
        constraint uq_prenom_employe unique (prenom),
        constraint uq_email_employe unique (email)
    );";

    //On execute la requete
    //$connexion->exec($sql);

    //Script d'insertion des données
    //$sql = "INSERT INTO formation_db.employes (prenom, ddn, titre, email, salaire)
    //    VALUES ('Joachim', '1969-03-20', 'PDG', 'joachim@j4l.fr', 100000),
    //           ('Patricia', '1978-09-29', 'DG', 'patricia@j4l.fr', 800000),
    //           ('Divine', '2004-12-28', 'DG', 'divine@j4l.fr', 800000),
    //           ('Shmuel', '2009-07-02', 'RH', 'shmuel@j4l.fr', 900000),
    //           ('Archange-Louis', '2013-11-08', 'RH', 'alouis@j4l.fr', 900000)";

    //On execute la requete
    //$connexion->exec($sql);

    //Script de selection
    $sql = "select * from employes";

    //On execute la requete
    $resultat = $connexion->query($sql);

    foreach ($resultat as $ligne) {
        echo "<h4>{$ligne['prenom']} - {$ligne['ddn']}</h4>";
    }
} catch (PDOException $e) {
    exit($e->getMessage());
}
