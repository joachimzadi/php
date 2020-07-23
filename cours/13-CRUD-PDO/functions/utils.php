<?php

/**
 * Permet de creer l'en-tete de notre site
 * @param $titre
 */
function template_en_tete_page($titre){
    echo <<<EOT
<!doctype html>
<html lang="fr">
<head>
    <title>$titre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesomes -->
    <script src="https://kit.fontawesome.com/ec63adeb54.js" defer crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>

</head>
<body>
<div class="container">

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">DAWM-ASNIERES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste.php">Employes</a>
                </li>
            </ul>
        </div>
    </nav>
EOT;

}

/**
 * Permet de creer le pied de page
 */
function template_pied_page(){
    echo <<<EOT
</div>

<!-- Bootstrap JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
EOT;

}
