<?php
require_once '../../service/dbConnect.php';
// Démarrer la session
session_start();

// Vérifier la non-existance de la clé userId dans $_SESSION
if (!isset($_SESSION['userId']) || $_SESSION['admin'] !== 'isAdmin') {
    header('location: /index.php');
    exit();
}

// Variable et constance
const ERROR_REQUIRED = 'Veuillez renseigner ce champ !';
const ERROR_VALUE_EXISTING = '';
$errorsChamps = [
    'lastName' => '',
    'firstName' => '',
    'email' => ''
];
$messageErrors = '';

// Je récupère l'id en paramètre de l'url avec $_GET
$dataId = $_GET['id'];

// Au chargement de la page, je souhaite envoyer une requète de type SELECT
$sql = "SELECT * FROM user WHERE id = :dataId";

// Je vérifie si j'ai accès à une instance de connexion PDO
if (isset($db_connexion)) {
    $statement = $db_connexion->prepare($sql);
}
// Dans $statement j'associe les paramètres nommés avec les bonnes variables
$statement->bindParam(':dataId', $dataId);

// J'exécute la requète paramétrée nommée (requète sécurisée)
$statement->execute();

// Dans une variable, je stock le todo récupéré
$data = $statement->fetch();

// Je récupère les informations de l'utilisateur
$lastName = $data['lastName'];
$firstName = $data['firstName'];
$email = $data['email'];
// $password = $data['password'];

$oldLastName = $data['lastName'];
$oldFirstName = $data['firstName'];
$oldEmail = $data['email'];
// $oldPassword = $data['password'];

// Modification des données
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['UPDATE'])) {
    // var_dump($_POST);

    $_POST = filter_input_array(INPUT_POST, [
        'lastName' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'firstName' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ]);


    $lastName = $_POST['lastName']  ?? '';
    $firstName = $_POST['firstName']  ?? '';
    $email = $_POST['email']  ?? '';

    // Gestion des oublis/erreurs utilisateurs
    // Nom
    if (!$lastName) {
        $errorsChamps['titlastNamele'] = ERROR_REQUIRED;
    }
    // Prénom
    if (!$firstName) {
        $errorsChamps['firstName'] = ERROR_REQUIRED;
    }
    // Email
    if (!$email) {
        $errorsChamps['email'] = ERROR_REQUIRED;
    }
    // Vérification si au moins un champ à était changer
    if ($lastName === $oldLastName && $firstName === $oldFirstName && $email === $oldEmail) {
        $messageErrors = "<span class='message'>Veuillez modifier un champs pour mettre à jour le profil.</span>";
    }

    if ($lastName && $firstName && $email && ($lastName !== $oldLastName || $firstName !== $oldFirstName || $email !== $oldEmail)) {
        $sql = 'UPDATE `user` SET lastName = :lastName, firstName = :firstName, email = :email WHERE id = :dataId;';
        //  La préparer
        $db_statement = $db_connexion->prepare($sql);

        // J'associe les paramètres nommées avec les bonnes variables
        $db_statement->bindParam(':lastName', $lastName);
        $db_statement->bindParam(':firstName', $firstName);
        $db_statement->bindParam(':email', $email);
        $db_statement->bindParam(':dataId', $dataId);

        // L'exécuter
        $db_statement->execute();

        header('location: ../dashboard.php');
    }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio 2025 | SUAREZ Lucas</title>
    <meta name="description" content="Découvrez mon portfolio 2025, mettant en avant mes projets créatifs, compétences et réalisations professionnelles.">
    <link rel="shortcut icon" href="../../media/img/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../../style/main.css"><!-- CSS Main -->
    <link rel="stylesheet" href="../../style/navBar.css"><!-- CSS NavBar -->
    <link rel="stylesheet" href="../../style/footer.css"><!-- CSS Footer -->
    <script src="../../script/navBar.js" defer></script><!-- JS NavBar -->
    <script type="module" src="../../script/footer.js"></script><!-- JS Footer -->
</head>

<body>
    <header>
        <!-- Barre Nav -->
        <?php require_once '../component/navBar.php'; ?>
    </header>

    <!-- Main -->
    <main class="home">
        <fieldset>
            <legend>Modifier le profil</legend>
            <form action="#" method="post" class="update">
                <div class="nomPrenom">
                    <div class="nom">
                        <!-- Nom -->
                        <label for="idLastName">Nom :</label>
                        <input type="text" id="idLastName" name="lastName" value="<?= htmlspecialchars($lastName); ?>" <?= $errorsChamps['lastName'] ? 'placeholder=\'' . $errorsChamps['lastName'] . '\'' : "" ?>>
                    </div>
                    <div class="nom">
                        <!-- Prénom -->
                        <label for="idFirstName">Prénom :</label>
                        <input type="text" id="idFirstName" name="firstName" value="<?= htmlspecialchars($firstName); ?>" <?= $errorsChamps['firstName'] ? 'placeholder=\'' . $errorsChamps['firstName'] . '\'' : "" ?>>
                    </div>
                </div>
                <!-- Email -->
                <label for="idEmail">Email :</label>
                <input type="text" id="idEmail" name="email" value="<?= htmlspecialchars($email); ?>" <?= $errorsChamps['email'] ? 'placeholder=\'' . $errorsChamps['email'] . '\'' : "" ?>>

                <div class="form">
                    <!-- Message Erreurs -->
                    <?= $messageErrors ?>
                </div>

                <input type="submit" name="UPDATE">

            </form>
        </fieldset>
        <!-- Lien retour -->
        <div class="divBtn">
            <a href="../dashboard.php" class="btn">Retour</a>
        </div>
    </main>
    <img src="../../media/img/vagueBas.svg" alt="Image en forme de vague pour faire la liaison entre le site et le footer" class="vagueBas">

    <!-- Footer -->
    <?php require_once '../component/footer.php'; ?>

</body>

</html>