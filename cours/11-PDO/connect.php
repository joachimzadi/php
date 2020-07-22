<?php
$servername = "localhost";
$dbName = "dawm_db";

$username = "root";
$password = "";

try {
    $connect = new PDO("mysql:host=$servername;dbName=$dbName", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h2>CONNEXION OK</h2>";
} catch (Exception $e) {
    echo "<h2>CONNEXION NOK</h2>";
}