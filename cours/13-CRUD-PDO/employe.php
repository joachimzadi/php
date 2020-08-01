<?php
require_once "functions/app_utils.php";

//On se connecte à la base de données
$connexion = db_connexion();

//On recupere la method (GET ou POST) de la requete
$method = $_SERVER['REQUEST_METHOD'];

//Si la methode est GET
if (($method === "GET") && !empty($_GET['id'])) {
    //On recupere l'id de l'employé s'il existe
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
}

//On verifie que des données ont bien ete postées
if (($method === "POST") && !empty($_POST)) {

    //On les encapsule dans des variables
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] !== '-1' ? $_POST['id'] : null;
    $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : '';
    $ddn = !empty($_POST['ddn']) ? $_POST['ddn'] : '';
    $fonction = !empty($_POST['fonction']) ? $_POST['fonction'] : '';
    $email = !empty($_POST['email']) ? $_POST['email'] : '';
    $salaire = !empty($_POST['salaire']) ? $_POST['salaire'] : '';
    $photo = !empty($_FILES['photo']['tmp_name']) ? $_FILES['photo'] : "photo_" . $prenom;

    //On verifie que les saisies correspondent bien aux valeurs attendues dans les champs
    $estUnEntier = filter_input(INPUT_POST, 'salaire', FILTER_VALIDATE_INT);
    $estUnEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $prenomValide = strlen(trim($prenom)) !== 0;
    $tailleMax = 8;

    if (!$prenomValide) {
        $msgPrenom = "Le prenom est requis";
    }

    if (!$estUnEmail) {
        $msgEmail = "Adresse email non valide";
    }

    $tailleCorrect = empty($photo['error']) && (filesize($photo['tmp_name']) <= $tailleMax * 100000);

    if (!$tailleCorrect) {
        $msgPhoto = "La taille de la phote doit être inferieure à $tailleMax. Mo";
    }

    $formatCorrect = (exif_imagetype($photo['tmp_name']) === 2) || (exif_imagetype($photo['tmp_name']) === 3);
    if (!$formatCorrect) {
        $msgFormat = "L'image doit être au format .jpeg ou .png";
    }

    if (!$estUnEntier) {
        $msgSalaire = "Le salaire est un nombre entier";
    }
    if ($prenomValide && $estUnEmail && $tailleCorrect && $estUnEntier && $formatCorrect) {
        //Instruction parametrée SQL d'insertion
        $sql_insert = "insert into Employes values (?,?,?,?,?,?)";
        $sql_update = "update Employes set prenom = ?, ddn = ?, fonction = ?, email = ?, salaire = ? where id = ?";

        //On execute la requete
        if (empty($id)) {
            //On prepare la requete
            $reqPreparee = $connexion->prepare($sql_insert);
            $resultat = $reqPreparee->execute([$id, $prenom, $ddn, $fonction, $email, $salaire]);
            $id = $connexion->lastInsertId();
        } else {
            //On prepare la requete
            $reqPreparee = $connexion->prepare($sql_update);
            $resultat = $reqPreparee->execute([$prenom, $ddn, $fonction, $email, $salaire, $id]);
        }
        if ($resultat) {
            $chemin = "assets/img/" . $id . ".jpg";
            $transfert = move_uploaded_file($photo['tmp_name'], $chemin);
        }
        //On est redirigé vers la pages des employés
        header("Location:employes.php");
    }
}

?>

<!--Insertion de l'en-tete de notre site-->
<?php template_en_tete_page("Page Employé"); ?>

<!--EN-TETE DE PAGE-->
<div class="page-header">
    <h1>gestion employé</h1>
</div>

<!--FORMULAIRE-->
<section class="form-employe">
    <div class="container profile profile-view" id="profile">
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id"
                   value="<?php echo $employe['id'] ?? ''; ?>">
            <div class="form-row profile-row">
                <div class="col-md-4 relative">
                    <div class="avatar">
                        <div class="avatar-bg center"></div>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo"
                               name="photo"
                               value="<?php echo $employe['photo'] ?? ''; ?>">
                        <label class="custom-file-label" for="photo">Choisissez votre photo</label>
                        <?php
                        if (!empty($msgPhoto)) {
                            echo <<<EOT
                                <span class="error">{$msgPhoto}</span>
                            EOT;
                        }
                        if (!empty($msgFormat)) {
                            echo <<<EOT
                                <span class="error">{$msgFormat}</span>
                            EOT;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <h1>Profile</h1>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="prenom">Prénom </label>
                                <input id="prenom" class="form-control" type="text"
                                       name="prenom"
                                       required
                                       autocomplete="off"
                                       value="<?php echo $employe['prenom'] ?? ''; ?>">
                                <?php
                                if (!empty($msgPrenom)) {
                                    echo <<<EOT
                                            <span class="error">{$msgPrenom}</span>
                                        EOT;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="ddn">Date de naissance</label>
                                <input id="ddn" class="form-control" type="date" name="ddn"
                                       value="<?php echo $employe['ddn'] ?? ''; ?>"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="email">Email </label>
                                <input id="email" class="form-control" type="email" autocomplete="off"
                                       required
                                       value="<?php echo $employe['email'] ?? ''; ?>"
                                       name="email">
                                <?php
                                if (!empty($msgEmail)) {
                                    echo <<<EOT
                                            <span class="error">{$msgEmail}</span>
                                        EOT;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="fonction">Fonction:</label>
                                <select class="form-control" id="fonction" name="fonction" required>
                                    <option value="<?php echo $employe['fonction'] ?? ''; ?>"
                                            selected><?php echo $employe['fonction'] ?? ''; ?></option>
                                    <option value="pdg">PDG</option>
                                    <option value="dg">DG</option>
                                    <option value="rh">RH</option>
                                    <option value="dsi">DSI</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="salaire">Salaire</label>
                                <input id="salaire" class="form-control" type="text"
                                       value="<?php echo $employe['salaire'] ?? ''; ?>"
                                       name="salaire" autocomplete="off" required>
                                <?php
                                if (!empty($msgSalaire)) {
                                    echo <<<EOT
                                            <span class="error">{$msgSalaire}</span>
                                        EOT;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 d-inline-flex justify-content-between content-right">
                            <button class="btn btn-primary form-btn" type="submit">ENREGISTRER</button>
                            <button class="btn btn-danger form-btn" type="reset">RESET</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php template_pied_page(); ?>

<script>
    // Ajoutez le code suivant si vous voulez que le nom du fichier apparaisse sur select
    $(".custom-file-input").on("change", function () {
        let fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>