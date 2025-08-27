<?php
require_once '../../service/dbConnect.php';

// Démarrer la session
session_start();

// Vérifier la non-existance de la clé userId dans $_SESSION
if (!isset($_SESSION['userId']) || $_SESSION['admin'] !== 'isAdmin') {
    header('location: /index.php');
    exit();
}

// Je récupère l'id en paramètre de l'url avec $_GET
$idProfil = $_GET['id'];

$sql = "DELETE FROM `user` WHERE id = :idProfil";

if (isset($db_connexion)) {
    $statement = $db_connexion->prepare($sql);
}

$statement->bindParam(':idProfil', $idProfil);

$statement->execute();

header('location: ../dashboard.php');
