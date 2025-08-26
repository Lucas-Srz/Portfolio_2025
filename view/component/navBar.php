<?php

// NavBar
$navBar = '';
// Si c'est un utilisateur (Connecter)
if (isset($_SESSION['userId']) && $_SESSION['userId'] !== null) {

    // Les différents <li> réservés aux utilisateurs
    $navBar .= '
            <div id="navBar">
                <ul>
                    <li class="off"><a href="/index.php" class="animLigne">Home</a></li>
                    <li><a href="/view/#" class="animLigne">A propos</a></li>
                    <li><a href="/view/#" class="animLigne">Projet</a></li>
                    <li><a href="/view/#" class="animLigne">Contact</a></li>
                    <li><a href="/view/home.php" class="animLigne">Profil</a></li>';

    if ($_SESSION['admin'] == 'isAdmin') {
        $navBar .= ' <li><a href="/view/dashboard.php" class="animLigne">Dashboard</a></li>';
    }

    $navBar .= '    <li class="off"><a href="/view/#" class="animLigne">Mention Legal</a></li>
                    <li class="off"><a href="/view/#" class="animLigne">Accessibilité</a></li>
                    <li><a href="/view/logout.php" class="animLigne">Déconnection</a></li>
                </ul>
            </div>
        ';
}
// Si j'ai un visiteur (Non-Connecter)
else {
    $navBar .= '
            <div id="navBar">
                <ul>
                    <li class="off"><a href="/index.php" class="animLigne">Home</a></li>
                    <li><a href="/view/#" class="animLigne">A propos</a></li>
                    <li><a href="/view/#" class="animLigne">Projet</a></li>
                    <li><a href="/view/#" class="animLigne">Contact</a></li>
                    <li class="off"><a href="/view/#" class="animLigne">Mention Legal</a></li>
                    <li class="off"><a href="/view/#" class="animLigne">Accessibilité</a></li>
                </ul>
            </div>
        ';
}

?>
<!-- Barre Nav -->
<nav>
    <a href="/index.php" class="navDivImgH1">
        <img src="/media/img/logo.webp" alt="Logo du site" class="navImgLogo">
        <h1>SUAREZ Lucas</h1>
    </a>

    <!-- Appel à la barre de Nav -->
    <?= $navBar; ?>

</nav>