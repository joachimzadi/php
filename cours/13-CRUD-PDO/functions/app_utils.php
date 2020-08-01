<?php

/**
 * Permet de se connecter à la base de données de l'exercice
 * @return PDO une instance de la classe PDO, sinon leve une execption
 */
function db_connexion()
{
    //Les paprametres de connexion à la base de données
    $database = "dawm_db";
    $user = "root";
    $pass = "";
    //L'URL de la BDD
    $url = "mysql:host=127.0.0.1;dbname=$database;charset=utf8";

    try {
        //Connexion à la base de données
        $connexion = new PDO($url, $user, $pass);
        //Passe le parametre local des dates à notre connexion
        $connexion->exec("set lc_time_names='fr_FR'");
        //générer des exceptions en cas d'erreur
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //On retourne une instance de la connexion
        return $connexion;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

/**
 * Permet de supprimer de la BDD l'employé dont l'id est passé en parametre
 * @param $id
 */
function supprimer_employe($id)
{
    $connexion = db_connexion();
    if (!empty($id)) {
        $sql_suppression = "delete from Employes where id = ?";
        $req_preparee = $connexion->prepare($sql_suppression);
        $req_preparee->execute([$id]);
    }
    header("Location:employes.php");
}

/**
 * Permet de creer l'en-tete de notre site
 * @param $titre
 */
function template_en_tete_page($titre)
{
    echo <<<EOT
            <!doctype html>
            <html lang="fr">
            <head>
                <title>$titre</title>
                <meta name="description" content="Mise en oeuvre de Bootstrap sur un projet PHP CRUD PDO"/>
                <meta name="author" content="Joachim Zadi!"/>
            
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
                <!-- FontAwesome KIT -->
                <script src="https://kit.fontawesome.com/ec63adeb54.js" defer crossorigin="anonymous"></script>
            
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="assets/css/bootstrap.css"/>
                <link rel="stylesheet" href="assets/css/app.css"/>
            </head>
            <body>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--BAR DE NAVIGATION-->
                        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
                            <a class="navbar-brand" href="#">
                                <img class="logo" src="assets/img/j4l_logo.svg" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-brand" href="#">DWWM-ASNIERES</a>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="navbar-nav ml-md-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="employes.php">Employés</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
    EOT;
}

/**
 * Permet de creer le pied de page
 */
function template_pied_page()
{
    echo <<<EOT
            </div>
            </div>
            
            <footer id="footerpad" class="container fixed-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-8 mx-auto">
                            <ul class="list-inline text-center">
                                <li class="list-inline-item"><a href="#"><span class="fa-stack fa-lg"><i
                                                    class="fa fa-circle fa-stack-2x"></i><i
                                                    class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="fa-stack fa-lg"><i
                                                    class="fa fa-circle fa-stack-2x"></i><i
                                                    class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="fa-stack fa-lg"><i
                                                    class="fa fa-circle fa-stack-2x"></i><i
                                                    class="fa fa-instagram fa-stack-1x fa-inverse"></i></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="fa-stack fa-lg"><i
                                                    class="fa fa-circle fa-stack-2x"></i><i
                                                    class="fa fa-pinterest fa-stack-1x fa-inverse"></i></span></a></li>
                            </ul>
                            <p class="copyright text-center">Copyright &copy; j4l-technologies 2020 | pour dwwm-asnieres</p>
                            </div>
                    </div>
                </div>
            </footer>
            
            </div>
            
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="assets/js/jquery.js"></script>
            <script src="assets/js/bootstrap.bundle.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            </body>
            </html>
    EOT;
}