<?php
require_once "functions/app_utils.php";

if (!empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    supprimer_employe($id);
}
