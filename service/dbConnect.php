<?php
// Crée une instance de connexion PDO (PHP Data Object)
$dsn = "mysql:host=#;dbname=#"; // Data Storage Network
$pseudo = '#';
$password = '#';

// Connexion à la BDD et gérer les erreurs s'il y en a
try{
    $db_connexion = new PDO($dsn, $pseudo, $password);
    $db_connexion->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8'); // Ajout d'un attribue pour l'encodage des caracteres en UTF8
    $db_connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Ajout d'un attribue pour mettre en forme les datas reçues dans un tableau associatif
    $db_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      // Ajout d'un attribue pour la gestion des erreurs
} catch(PDOException $e){
    echo '<p>Erreur lors de la création d\'une instance de connexion PDO vers la BDD.</p>';
    echo '<p>Fichier : ' . $e->getFile() . '</p>';
    echo '<p>N° de lignes : ' . $e->getLine() . '</p>';
    echo '<p>Erreurs : ' . $e->getMessage() . '</p>';
}