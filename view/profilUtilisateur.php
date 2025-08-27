<?php
require_once '../service/dbConnect.php';

$sql = "SELECT * FROM user";

// Si j'ai accès à une instance de connexion PDO, alors j'envoie ma requète
if (isset($db_connexion)) {
    $statement = $db_connexion->query($sql);
}

// Je récupère les 5 todos dans un tableau à indices ordonnées. Il est multidimensionnel.
$data = $statement->fetchAll();
// var_dump($data);

// Je souhaite afficher les titres des 5 todos reçus dans <section>
$listProfilUtilisateur = "<section>";

// Je boucle sur $todos afin de manipuler 1 par 1 chaque todo
for ($i = 0; $i < count($data); $i++) {
    /* - - - - - Email afficher en 'XX*****XX@XX******* - - - - - */
    $email = $data[$i]['email'];
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
    for ($j = 0; $j < ($lenLocal - 4); $j++) {
        $emailHide .= '*';
    }
    $emailHide .= $lastLetterLocal;
    $emailHide .= '@';
    $emailHide .= $firstLetterDomain;
    for ($j = 0; $j < ($lenDomain - 2); $j++) {
        $emailHide .= '*';
    }


    /* - - - - - Affichage des données - - - - - */
    $listProfilUtilisateur .= "<article class='articleProfilUtilisateur'>";
    $listProfilUtilisateur .= "<div class='info'>";
    $listProfilUtilisateur .= "<p><span>Nom :</span> " . $data[$i]['lastName'] . "</p>";
    $listProfilUtilisateur .= "<p><span>Prénom :</span> " . $data[$i]['firstName'] . "</p>";
    $listProfilUtilisateur .= "<p><span>Email :</span> " . $emailHide . "</p>";
    $listProfilUtilisateur .= "<p><span>Mdp :</span> ************</p>";
    $listProfilUtilisateur .= "</div>";
    $listProfilUtilisateur .= "<div class='img'>";
    $listProfilUtilisateur .= "<a href='./dashboard/update_profil.php?id=" . $data[$i]['id'] . "'><img src='../media/img/edit.svg' alt='Editée un profil'></img></a>";
    $listProfilUtilisateur .= "<a href='./dashboard/delete_profil.php?id=" . $data[$i]['id'] . "'><img src='../media/img/delete.svg' alt='Editée un profil'></img></a>";
    $listProfilUtilisateur .= "</div>";
    $listProfilUtilisateur .= "</article>";
    $listProfilUtilisateur .= "<span class='ligne'></span>";
}

$listProfilUtilisateur .= '</section>';
?>

<div class="profilUtilisateur">
    <fieldset class="fieldsetProUti">
        <legend>Profil Utilisateur</legend>
        <?= $listProfilUtilisateur ?>
    </fieldset>
</div>