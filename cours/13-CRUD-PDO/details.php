<?php
require_once "functions/app_utils.php";

//On se connecte à la base de données
$connexion = db_connexion();

//On recupere l'id de l'mployé s'il existe
$id = htmlspecialchars($_GET['id']);
//Instruction sql de selection de l'employé
$sql = "select * from Employes where id = ?";
//On prepare la requete
$req_preparee = $connexion->prepare($sql);
//On passe les parametres à la requete preparée
$req_preparee->execute([$id]);
//On recupere le resultat dans la variable employé
$employe = $req_preparee->fetch(PDO::FETCH_ASSOC);

//Si l'employé n'est pas retrouvée dans la base de données,
// on est redirigé sur la page d'accueil
if (empty($employe)) {
    header("Location:employes.php");
    exit();
}

?>

    <!--Insertion de l'en-tete de notre site-->
<?php template_en_tete_page("Page détails Employé"); ?>

    <!--EN-TETE DE PAGE-->
    <div class="page-header">
        <h1>détails employé</h1>
    </div>
    <p>
        Dépuis cette page, vous pouvez revenir sur la page d'accueil en cliquant sur le lien <strong>Accueil</strong>.
        Vous avez aussi la possibilité de revenir sur la liste des employés en cliquant sur le lien <strong>Employés</strong>.
    </p>
    <div style="width:50%;margin: 3rem auto">
        <div class="row">
            <div class="col-5">
                <img class="card-img-top img-thumbnail photo" src="assets/img/<?php echo $employe['id'] . ".jpg"; ?>"
                     alt="<?php echo $employe['id'] . ".jpg"; ?>">
            </div>
            <div class="col-7">
                <h4 class="detail-prenom"><?php echo $employe['prenom'] ?? ''; ?></h4>
                <p class="card-text"><?php echo strtoupper($employe['fonction']) . " de l'entreprise" ?? ''; ?></p>
                <p class="card-text"><?php echo "Contact : " . strtolower($employe['email']) ?? ''; ?></p>
            </div>
        </div>

    </div>

<?php template_pied_page(); ?>