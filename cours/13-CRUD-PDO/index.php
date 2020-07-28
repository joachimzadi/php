<?php
require_once "functions/app_utils.php"
?>

<!--Insertion de l'en-tete de notre site-->
<?php template_en_tete_page("Page Accueil"); ?>

<!--EN-TETE DE PAGE-->
<div class="page-header">
    <h1>les operations crud avec pdo en php</h1>
</div>
<p class="commentaire">
    Cet exercice a pour but de mettre en oeuvre nos connaissances vues en PHP, MySQL, HTML, CSS est BOOSTRAP 4. Nous y effectuons les
    opérations CRUD basiques sur une base de données. Nous utilisons également bootstrap pour le design de notre site. J'ai ajouté le script
    PHP vous permettant de faire la pagination d'une liste.
    Si vous lisez ce texte, c'est que vous est sur la page d'accueil. Vous pouvez afficher la liste des employés en cliquant sur le lien
    <strong><em>Employés</em></strong> en haut à droite.
</p>

<?php template_pied_page(); ?>
