<?php
session_start();

// Message pour l'inscription
if (isset($_SESSION['errorMessageIns'])) {
    $errorsChampsIns = $_SESSION['errorMessageIns'];
}

// Message pour la connexion
if (isset($_SESSION['errorMessageCon'])) {
    $errorsChampsCon = $_SESSION['errorMessageCon'];
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio 2025 | SUAREZ Lucas</title>
    <meta name="description" content="Découvrez mon portfolio 2025, mettant en avant mes projets créatifs, compétences et réalisations professionnelles.">
    <link rel="shortcut icon" href="media/img/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="style/main.css"><!-- CSS Main -->
    <link rel="stylesheet" href="style/navBar.css"><!-- CSS NavBar -->
    <link rel="stylesheet" href="style/footer.css"><!-- CSS Footer -->
    <script src="script/navBar.js" defer></script><!-- JS NavBar -->
    <script type="module" src="script/footer.js"></script><!-- JS Footer -->
</head>

<body>
    <!-- Barre Nav -->
    <?php require_once './view/component/navBar.php'; ?>

    <!-- Main -->
    <main>
        <!-- Accueil -->
        <section id="acc">
            <div id="contenu">
                <div>
                    <h2 class="desc">Développeur web et web mobile</h2>
                    <h2 class="nom off">SUAREZ Lucas</h2>
                </div>
                <img src="media/img/avatars.png" alt="Image de mon avatars me representant" class="off">
            </div>
            <span id="fondSupplementaire"></span>
            <img src="media/img/vague.svg" alt="Vague décorative haut de page" class="vague">
        </section>

        <!-- Information -->
        <section id="inf">
            <div class="sep">
                <div class="lin">
                    <div class="cer"></div>
                    <div class="cer"></div>
                    <div class="cer"></div>
                </div>
            </div>
            <hgroup class="apr">
                <h2>À propos</h2>
                <p>Je suis SUAREZ Lucas, un développeur web passionné. Mon objectif est de transformer des idées en réalités numériques, en partant d'une feuille blanche jusqu'à voir un site prendre vie à travers différentes inspirations !</p>
            </hgroup>

            <hgroup class="dev">
                <h2>De moi</h2>
                <p>Depuis 2018, je m'immerge dans l'univers du développement web, alliant créativité et savoir-faire technique. Avec une attention particulière portée au front-end, chaque détail compte pour offrir une expérience centrée sur l'utilisateur. Je m'assure que chaque projet est unique et qu’il répond aux besoins spécifiques, tout en utilisant les technologies et langages de programmation les plus récents.</p>
            </hgroup>

            <hgroup class="aut">
                <h2>Et en dehors...</h2>
                <p>En dehors du développement web, j'aime explorer les nouvelles tendances technologiques, les jeux vidéo et les jeux de société, notamment ceux basés sur des énigmes. Je suis également barman dans une salle de spectacle.</p>
            </hgroup>
        </section>
    </main>
    <img src="media/img/vagueBas.svg" alt="Image en forme de vague pour faire la liaison entre le site et le footer" class="vagueBas">

    <!-- Footer -->
    <?php require_once './view/component/footer.php'; ?>
</body>

</html>