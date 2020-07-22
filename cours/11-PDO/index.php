<?php
//TODO ++> ICI LE CODE PHP

?>
<!doctype html>
<html lang="fr">
<head>
    <title>CRUD PDO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FONTAWESOM KIT -->
    <script src="https://kit.fontawesome.com/ec63adeb54.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/style.css"/>

</head>
<body>
<div class="container">
    <div class="monForm">
        <div class="form-titre">
            ajouter un stagiaire
        </div>
        <form method="post">
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" name="prenom" id="prenom"
                       placeholder="Entrez ici votre prenom"/>
            </div>
            <div class="form-group">
                <label for="age">Âge :</label>
                <input type="text" class="form-control" name="age" id="age" placeholder="Entrez ici votre age"/>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
    </div>
    <p>
        <a href="#" class="btn btn-primary">Ajouter</a>
    </p>
    <div class="mon-tableau">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Prenom</th>
                <th>Date de naissance</th>
                <th>Âge</th>
                <th colspan="2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Joachim</td>
                <td>20-03-1969</td>
                <td>51 ans</td>
                <td class="icon icon-modifier">
                    <i class="fas fa-user-edit"></i>
                </td>
                <td class="icon icon-supprimer">
                    <i class="fas fa-user-minus"></i>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ketia</td>
                <td>15-12-1981</td>
                <td>39 ans</td>
                <td class="icon icon-modifier">
                    <i class="fas fa-user-edit"></i>
                </td>
                <td class="icon icon-supprimer">
                    <i class="fas fa-user-minus"></i>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

