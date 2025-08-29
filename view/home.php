<?php
require_once '../service/dbConnect.php';
session_start();

// Vérifier la non-existance de la clé userId dans $_SESSION
if (!isset($_SESSION['userId'])) {
    header('location: /index.php');
    exit();
}

// Je récupère l'email de l'utilisateur à afficher
$user = $_SESSION['userId'];

$sql = 'SELECT * FROM user WHERE id = ' . $user . '';

if (isset($db_connexion)) {
    $statement = $db_connexion->query($sql);
}

$data = $statement->fetch();

$lastName = $data['lastName'];
$firstName = $data['firstName'];
// Email afficher en 'XX*****XX@XX*******
$email = $data['email'];

// Explode de l'adresse et on récuper les différentes partie
$expEmail = explode("@", $email);
$local = $expEmail[0];
$domain = $expEmail[1];

// Taille des données
$lenLocal = strlen($local);
$lenDomain = strlen($domain);

// On récuper les informations interesente
$firstLetterLocal = substr($local, 0, 2);
$lastLetterLocal = substr($local, -2);
$firstLetterDomain = substr($domain, 0, 2);

$emailHide = $firstLetterLocal;
for ($i = 0; $i < ($lenLocal - 4); $i++) {
    $emailHide .= '*';
}
$emailHide .= $lastLetterLocal;
$emailHide .= '@';
$emailHide .= $firstLetterDomain;
for ($i = 0; $i < ($lenDomain - 2); $i++) {
    $emailHide .= '*';
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio 2025 | SUAREZ Lucas</title>
    <meta name="description" content="Découvrez mon portfolio 2025, mettant en avant mes projets créatifs, compétences et réalisations professionnelles.">
    <link rel="shortcut icon" href="../media/img/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../style/main.css"><!-- CSS Main -->
    <link rel="stylesheet" href="../style/navBar.css"><!-- CSS NavBar -->
    <link rel="stylesheet" href="../style/footer.css"><!-- CSS Footer -->
    <script src="../script/navBar.js" defer></script><!-- JS NavBar -->
    <script type="module" src="../script/footer.js"></script><!-- JS Footer -->
</head>

<body>
    <header>
        <!-- Barre Nav -->
        <?php require_once 'component/navBar.php'; ?>
    </header>

    <!-- Main -->
    <main class="home">
        <!-- Affichage du profil -->
        <fieldset>
            <legend>Profil</legend>
            <p><span>Nom :</span> <?= $lastName ?></p>
            <p><span>Prénom :</span> <?= $firstName ?></p>
            <p><span>Adresse mail :</span> <?= $emailHide ?></p>
            <p><span>Mot de passe :</span> ************</p>
        </fieldset>

        <div class="divBtn">
            <a href="#" class="btn">Changer mes informations personelles</a>
        </div>

    </main>
    <img src="../media/img/vagueBas.svg" alt="Image en forme de vague pour faire la liaison entre le site et le footer" class="vagueBas">

    <!-- Footer -->
    <?php require_once './component/footer.php'; ?>
</body>

</html>