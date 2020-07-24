<?php
require_once "functions/utils.php";

template_en_tete_page("Employés");
?>

    <!-- PAGE LISTE EMPLOYES -->
    <div>
        <h1>Employes</h1>
        <hr>
        <p>
            <a href="ajouter.php" class="btn btn-primary">Ajouter un employé</a>
        </p>
        <div>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Prenom</th>
                    <th>Date de naissance</th>
                    <th>Fonction</th>
                    <th>Email</th>
                    <th>Salaire</th>
                    <th colspan="2">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Doe</td>
                    <td>29-09-2009</td>
                    <td>PDG</td>
                    <td>john@example.com</td>
                    <td>100000</td>
                    <td><a href=""><i class="fas fa-user-edit"></i></a></td>
                    <td><a href=""><i class="fas fa-user-slash"></i></a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Doe</td>
                    <td>29-09-2009</td>
                    <td>PDG</td>
                    <td>john@example.com</td>
                    <td>100000</td>
                    <td><a href=""><i class="fas fa-user-edit"></i></a></td>
                    <td><a href=""><i class="fas fa-user-slash"></i></a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Doe</td>
                    <td>29-09-2009</td>
                    <td>PDG</td>
                    <td>john@example.com</td>
                    <td>100000</td>
                    <td><a href=""><i class="fas fa-user-edit"></i></a></td>
                    <td><a href=""><i class="fas fa-user-slash"></i></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php
template_pied_page();
?>