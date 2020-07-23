<?php
require_once "functions/utils.php";

$connexion = db_connexion();

// Vérifie si les données POST ne sont pas vides
if (!empty($_POST)) {
    //On initialise les parametres de la resuete
//    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $ddn = isset($_POST['ddn']) ? $_POST['ddn'] : '';
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $salaire = isset($_POST['salaire']) ? $_POST['salaire'] : '';

    // Insérer un nouvel enregistrement dans la table des contacts
    $sql = "INSERT INTO employes(prenom, ddn, titre, email, salaire) VALUES (?, ?, ?, ?, ?)";
    $sql_preparee = $connexion->prepare($sql);
    $sql_preparee->execute([$prenom, $ddn, $titre, $email, $salaire]);

    header("Location:liste.php");
}

?>

<?php template_en_tete_page("Ajouté"); ?>
    <!-- PAGE AJOUTER UN EMPLOYE -->
    <div>
        <h1>Céer Employé</h1>
        <hr>
        <div>
            <form method="post">
                <input type="hidden" name="id"/>
                <div class="form-group">
                    <label for="ddn">Date de naissance</label>
                    <input type="date" class="form-control" placeholder="Votre date de naissane" name="ddn" id="ddn"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Entrez votre prénom" name="prenom"/>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Entrez votre email" name="email"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Entrez votre titre" name="titre"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Entrez votre salaire" name="salaire"/>
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>

<?php
template_pied_page();
?>