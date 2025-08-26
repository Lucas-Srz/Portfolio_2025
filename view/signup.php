<?php
require_once '../service/dbConnect.php';
session_start();

// Variable et Constance
const ERROR_REQUIRED_INSC = 'Veuillez renseigner ce champ !';
const ERROR_VALUE_DOUBLE_EMAIL_INSC = "L email est déjà utilisé...";
const PASSWORD_NUMBER_OF_CHARACTERS_INSC = 12;
const ERROR_PASSWORD_NUMBER_OF_CHARACTERS_INSC = 'Le mot de passe doit contenir ' . PASSWORD_NUMBER_OF_CHARACTERS_INSC . ' caractères';
const ERROR_PASSWORD_MAJ_INSC = "Le mot de passe doit contenir au moins une majuscule";
const ERROR_PASSWORD_MIN_INSC = "Le mot de passe doit contenir au moins une minuscule";
const ERROR_PASSWORD_NUM_INSC = "Le mot de passe doit contenir au moins un chiffre";
const ERROR_PASSWORD_SPE_INSC = "Le mot de passe doit contenir au moins un caractères spéciaux";
const ERROR_PASSWORD_DOUBLE_INSC = 'Les mots de passe ne correspondent pas.';
const ERROR_CHECK_INSC = "Veuillez accepter les conditions d'utilisation";
const ERROR_USE_INSC = "L'email choisi a déjà été utilisé";
const ERROR_ALL_REQUIRED_INSC = 'Veuillez renseigner tous les champs !';
const ACCOUNT_CREATED = "Votre compte a été créé !";

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INSCRIPTION - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Tableau '$errors' dans lequel j'ajouterai les messages d'erreur dès que nécessaire
$errorsChampsIns = [
    'lastNameIns' => '',
    'firstNameIns' => '',
    'emailIns' => '',
    'passwordIns' => '',
    'passwordConfIns' => '',
    'messageError' => '',
    'messageValid' => ''
];


// Soummission du formulaire avec une méthode 'POST' et vérification du 'POST'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['INSCRIPTION'])) {

    // On récuper le check avent pouvoir l'utiliser plus tard
    $check = $_POST['check'] ?? '';

    // NETTOYER / FILTRER TOUTES les datas
    $_POST = filter_input_array(INPUT_POST, [
        'lastNameIns' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'firstNameIns' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'emailIns' => FILTER_SANITIZE_EMAIL,
        'passwordIns' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'passwordConfIns' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ]);

    //  Stocke ET sécurisées toute les données
    $lastName = $_POST['lastNameIns'] ?? '';
    $firstName = $_POST['firstNameIns'] ?? '';
    $email = $_POST['emailIns']  ?? '';
    $password = $_POST['passwordIns']  ?? '';
    $passwordConf = $_POST['passwordConfIns']  ?? '';

    // Gestion des oublis/erreurs utilisateurs
    // LastName
    if (!$lastName) {
        $errorsChampsIns['lastNameIns'] = ERROR_REQUIRED_INSC;
        var_dump($errorsChampsIns['lastNameIns']);
    }
    // FirstName
    if (!$firstName) {
        $errorsChampsIns['firstNameIns'] = ERROR_REQUIRED_INSC;
    }
    // Email
    if (!$email) {
        $errorsChampsIns['emailIns'] = ERROR_REQUIRED_INSC;
    }
    // Password
    if (!$password) {
        $errorsChampsIns['passwordIns'] = ERROR_REQUIRED_INSC;
    } elseif (mb_strlen($password) < PASSWORD_NUMBER_OF_CHARACTERS_INSC) {
        $errorsChampsIns['passwordIns'] = ERROR_PASSWORD_NUMBER_OF_CHARACTERS_INSC;
    }
    // REGEX Password
    // Majuscule
    if (!preg_match('/[A-Z]/', $password)) {
        $errorsChampsIns['passwordIns'] = ERROR_PASSWORD_MAJ_INSC;
    }
    // Minuscule
    if (!preg_match('/[a-z]/', $password)) {
        $errorsChampsIns['passwordIns'] = ERROR_PASSWORD_MIN_INSC;
    }
    // Chiffre
    if (!preg_match('/[0-9]/', $password)) {
        $errorsChampsIns['passwordIns'] = ERROR_PASSWORD_NUM_INSC;
    }
    // Caractères spéciaux
    if (!preg_match('/[\W_]/', $password)) {
        $errorsChampsIns['passwordIns'] = ERROR_PASSWORD_SPE_INSC;
    }

    // PasswordConf
    if (!$passwordConf) {
        $errorsChampsIns['passwordConfIns'] = ERROR_REQUIRED_INSC;
    } elseif (mb_strlen($passwordConf) < PASSWORD_NUMBER_OF_CHARACTERS_INSC || $passwordConf !== $password) {
        $errorsChampsIns['passwordConfIns'] = ERROR_PASSWORD_DOUBLE_INSC;
    }
    // Check
    if ($check != 'on') {
        $errorsChampsIns['messageError'] = ERROR_CHECK_INSC;
    }

    // Vérification si l'ont exécute le code
    if ($lastName && $firstName && $email && (mb_strlen($password) >= PASSWORD_NUMBER_OF_CHARACTERS_INSC) && ($passwordConf == $password) && $check) {
        //  Préparer la requète SQL
        $sql = 'SELECT email FROM user WHERE email = :email;';

        // Si j'ai accès à une instance de connexion PDO, alors j'envoie ma requète
        if (isset($db_connexion)) {
            $db_statement = $db_connexion->prepare($sql);
        }

        // J'associe les paramètres nommées avec les bonnes variables
        $db_statement->bindParam(':email', $email);

        // Envoie de la requète
        $db_statement->execute();

        // Je compte le nombre d'enregistrement qui réponde à la requète
        $nb = $db_statement->rowCount();

        // Si je n'ai reçu aucun resultat, alors je valide l'envoi d'une requète INSERT INTO
        if ($nb <= 0) {
            //  Faire le requète INSERT INTO
            $sql = 'INSERT INTO user VALUES (DEFAULT, :lastName, :firstName, :email, :password, DEFAULT);';
            //  La préparer
            $db_statement = $db_connexion->prepare($sql);

            $h = password_hash($password, PASSWORD_DEFAULT);

            // J'associe les paramètres nommées avec les bonnes variables
            $db_statement->bindParam(':lastName', $lastName);
            $db_statement->bindParam(':firstName', $firstName);
            $db_statement->bindParam(':email', $email);
            $db_statement->bindParam(':password', $h);

            // L'exécuter
            $db_statement->execute();
            $errorsChampsIns['messageValid'] = ACCOUNT_CREATED;
            // header('location: ../index.php#conn');
            exit();
        } else {
            $errorsChampsIns['messageError'] = ERROR_USE_INSC;
            $_SESSION['errorMessageIns'] = $errorsChampsIns;
            header('Location: ../index.php#conn');
            // Véfification si le mail est déja utiliser
            // $sql_double = 'SELECT email FROM user WHERE email = :email;';
            // if (isset($db_connexion)) {
            //     $db_statement_double = $db_connexion->prepare($sql_double);
            // }
            // $db_statement_double->bindParam(':email', $email);
            // $db_statement_double->execute();

            // $result = $db_statement_double->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($result);
            // foreach ($result as $key) {
            //     if ($key['email'] === $email) {
            //         $errorsChampsIns['email'] = ERROR_VALUE_DOUBLE_EMAIL_INSC;
            //         exit();
            //     }
            // }
            exit();
        }
    } else {
        $_SESSION['errorMessageIns'] = $errorsChampsIns;
        header('Location: ../index.php#conn');
        exit();
    }
}
