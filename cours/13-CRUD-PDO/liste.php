<?php
require_once "functions/utils.php";

// Se connecter à la base de données MySQL
$connexion = db_connexion();

// Récupère le numero de page via la requête GET (URL param: page) si elle existe,
// si non il est initialisé par défaut la page à 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Nombre d'enregistrements à afficher sur chaque page
$enr_par_page = 5;

// L'instruction SQL parametrée premettant de récupérer les enregistrements de notre table de Employes, LIMIT déterminera la page
$sql = "SELECT * FROM employes ORDER BY id LIMIT ?, ?";

// On Prépare l'instruction
$sql_prepare = $connexion->prepare($sql);
$sql_prepare->bindValue(1, ($page - 1) * $enr_par_page, PDO::PARAM_INT);
$sql_prepare->bindValue(2, $enr_par_page, PDO::PARAM_INT);

// On execute la requete
$sql_prepare->execute();

// On recupere le resultat sous la forme d'un tableau associatif
$employes = $sql_prepare->fetchAll(PDO::FETCH_ASSOC);

// Instruction permettant de compter les employes de la base de données
$sql = "SELECT COUNT(*) FROM employes";

//Execution de la requete
$nb_employes = $connexion->query($sql)->fetchColumn();

?>


<?php template_en_tete_page("Liste Employés") ?>
    <!-- PAGE LISTE EMPLOYES -->
    <div>
        <h1>Employes</h1>
        <hr>
        <p>
            <a href="ajouter.php" class="btn btn-primary">Ajouter</a>
        </p>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Titre</th>
                <th>Email</th>
                <th>Salaire</th>
                <th colspan="2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($employes as $employe) {
                echo <<<EOT
                    <tr>
                        <td>{$employe['id']}</td>                    
                        <td>{$employe['prenom']}</td>                    
                        <td>{$employe['ddn']}</td>                    
                        <td>{$employe['titre']}</td>                    
                        <td>{$employe['email']}</td>                    
                        <td>{$employe['salaire']}</td>                    
                        <td>
                            <a href="#"><i class="fas fa-user-edit"></i></a>
                        </td>                    
                        <td>
                            <a href="#"><i class="fas fa-user-minus"></i></a>
                        </td>                    
                    </tr>
                EOT;
            }
            ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="liste.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
            <?php endif; ?>
            <?php if ($page * $enr_par_page < $nb_employes): ?>
                <a href="liste.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
            <?php endif; ?>
        </div>
    </div>

<?php
template_pied_page();
?>