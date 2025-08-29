<?php
session_start();

// Vérifier la non-existance de la clé userId dans $_SESSION
if (!isset($_SESSION['userId']) || $_SESSION['admin'] !== 'isAdmin') {
    header('location: /index.php');
    exit();
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
        <!-- Bouton -->
        <div class="divBtn divBtnTop">
            <a onclick="profilUtilisateur()" class="btn">Profil Utilisateur</a>
            <a onclick="projets()" class="btn">Projets</a>
        </div>

        <!-- Information -->
        <div>
            <!-- Profil Utilisateur -->
            <?php require_once 'profilUtilisateur.php'; ?>

            <!-- Projets -->
            <?php require_once 'projets.php'; ?>
        </div>
    </main>
    <img src="../media/img/vagueBas.svg" alt="Image en forme de vague pour faire la liaison entre le site et le footer" class="vagueBas">

    <!-- Footer -->
    <?php require_once './component/footer.php'; ?>

    <script>
        const DOM_PROFIL_UTILISATEUR = document.querySelector(".fieldsetProUti");
        const DOM_PROJETS = document.querySelector(".fieldsetPro");

        DOM_PROFIL_UTILISATEUR.classList.add("display");
        DOM_PROJETS.classList.add("notDisplay");

        function profilUtilisateur() {
            console.log("Profil Utilisateur");
            DOM_PROFIL_UTILISATEUR.classList.add("display");
            DOM_PROFIL_UTILISATEUR.classList.remove("notDisplay");

            DOM_PROJETS.classList.remove("display");
            DOM_PROJETS.classList.add("notDisplay");
        }

        function projets() {
            console.log("Projets");
            DOM_PROFIL_UTILISATEUR.classList.remove("display");
            DOM_PROFIL_UTILISATEUR.classList.add("notDisplay");

            DOM_PROJETS.classList.add("display");
            DOM_PROJETS.classList.remove("notDisplay");
        }
    </script>
</body>

</html>