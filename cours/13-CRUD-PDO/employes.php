<?php
require_once "functions/app_utils.php";

$connexion = db_connexion();

//On initialise une variable pour la pagination
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

//On determine le nombre d'enregistrement par page
$nb_employes_par_page = 5;

//Requete parametrée SQL pour la recuperation des employés
$sql = "select *, date_format(ddn,'%e %M %Y') as naissance from Employes order by id limit ?, ?";
//On prepare la requete
$req_preparee = $connexion->prepare($sql);
//On bind les parametres
$req_preparee->bindValue(1, ($page - 1) * $nb_employes_par_page, PDO::PARAM_INT);
$req_preparee->bindValue(2, $nb_employes_par_page, PDO::PARAM_INT);
//On execute la requete
$req_preparee->execute();
//On recupere les lignes resultats sous forme de tableau associatif
$employes = $req_preparee->fetchAll(PDO::FETCH_ASSOC);

//On determine le nombre total d'employés en BDD
$nb_employes_total = $connexion->query('SELECT COUNT(*) FROM Employes')->fetchColumn();
?>

<!--Insertion de l'en-tete de notre site-->
<?php template_en_tete_page("Page Employés"); ?>

<!--EN-TETE DE PAGE-->
<div class="page-header">
    <h1>liste des employés</h1>
</div>
<p>
    Dépuis cette page, vous pouvez revenir sur la page d'accueil en cliquant sur le lien <strong>Accueil</strong>.
    Vous avez aussi la possibilité d'ajouter un nouvel employé en cliquant sur le lien <strong>Ajouter</strong>.

</p>
<p class="float-right">
    <a href="employe.php" class="btn btn-primary">Ajouter</a>
</p>
<?php
if (!empty($msg)) {
    echo <<<EOT
            <div class="alert alert-success">
              <strong>$msg</strong>
            </div>
        EOT;
}
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">prénom</th>
        <th scope="col">date de naissance</th>
        <th scope="col">fonction</th>
        <th scope="col">email</th>
        <th scope="col">salaire</th>
        <th scope="col" colspan="3">actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($employes)) {
        foreach ($employes as $employe) {
            echo <<<EOT
                <tr>
                    <td class="identifiant">{$employe['id']}</td>
                    <td class="prenom">{$employe['prenom']}</td>
                    <td class="ddn">{$employe['naissance']}</td>
                    <td class="fonction">{$employe['fonction']}</td>
                    <td class="email">{$employe['email']}</td>
                    <td class="salaire">{$employe['salaire']} €</td>
                    <td>
                        <a class="modifier" href="employe.php?id={$employe['id']}">
                            <i class="fas fa-user-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a class="supprimer" href="supprimer.php?id={$employe['id']}">
                            <i class="fas fa-user-times"></i>
                        </a>
                    </td>
                    <td>
                        <a class="detail" href="details.php?id={$employe['id']}">
                            <i class="fas fa-info"></i>
                        </a>
                    </td>
                </tr>
            EOT;
        }
    } else {
        echo <<<EOT
                <tr>
                    <td colspan="8" class="no-employe">Aucun employé n'est enrégistré en base de données</td>                    
                </tr>
            EOT;
    }
    ?>
    </tbody>
</table>

<!--LA PAGINATION-->
<nav class="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href=employes.php?page=<?php echo $page - 1 ?>">Pécédent</a>
            </li>
        <?php endif; ?>

        <?php if ($page <= 1): ?>
            <li class="page-item disabled">
                <a class="page-link" href=employes.php?page=<?php echo $page - 1 ?>">Pécédent</a>
            </li>
        <?php endif; ?>

        <li class="page-item active">
            <a class="page-link" href="employes.php?page=<?php echo $page ?>"><?php echo "Page $page" ?></a
        </li>

        <?php if ($page * $nb_employes_par_page < $nb_employes_total): ?>
            <li class="page-item">
                <a class="page-link" href="employes.php?page=<?php echo $page + 1 ?>">Suivant</a>
            </li>
        <?php endif; ?>

        <?php if ($page * $nb_employes_par_page >= $nb_employes_total): ?>
            <li class="page-item disabled">
                <a class="page-link" href="employes.php?page=<?php echo $page + 1 ?>">Suivant</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php template_pied_page(); ?>
