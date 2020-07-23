<?php
require_once "functions/utils.php";

template_en_tete_page("Employés");
?>

<!-- PAGE LISTE EMPLOYES -->
<div>
    <h1>Employes</h1>
    <hr>
    <a href="ajouter.php" class="btn btn-primary">Ajouter un employé</a>
    <div>
        Bonjour, vous êtes sur la page de la liste des employés
    </div>
</div>

<?php
template_pied_page();
?>