<?php
require_once '../service/dbConnect.php';
session_start();

// Constente
const ERROR_REQUIRED_CONN = 'Veuillez renseigner ce champ !';
const ERROR_EMAIL_CONN = 'Mauvaise adresse mail, veuillez réessayer !';
const PASSWORD_NUMBER_OF_CHARACTERS_CONN = 12;
const ERROR_PASSWORD_NUMBER_OF_CHARACTERS_CONN = 'Le mot de passe doit contenir ' . PASSWORD_NUMBER_OF_CHARACTERS_CONN . ' caractères';
const ERROR_PASSWORD_CONN = 'Mauvais mot de passe, veuillez réessayer !';
const ERROR_ACCOUNT = 'Compte inexistant';

/* - - - - - - - - - - - - - - - - - - - - CONNEXION - - - - - - - - - - - - - - - - - - - - */
// Tableau '$errors' dans lequel j'ajouterai les messages d'erreur dès que nécessaire
$errorsChampsCon = [
    'emailCon' => '',
    'passwordCon' => '',
    'messageError' => ''
];

// Soummission du formulaire avec une méthode 'POST' et vérification du 'POST'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['CONNEXION'])) {

    // NETTOYER / FILTRER TOUTES les datas
    $_POST = filter_input_array(INPUT_POST, [
        'emailCon' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'passwordCon' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ]);

    //  Stocke ET sécurisées toute les données
    // Si la valeur de '$_POST['userName']', elle est importée dans la variable sinon elle est décalrée à vide
    $email = $_POST['emailCon'] ?? '';
    $password = $_POST['passwordCon']  ?? '';

    // Gestion des oublis/erreurs utilisateurs
    // UserName
    if (!$email) {
        $errorsChampsCon['emailCon'] = ERROR_REQUIRED_CONN;
    }
    // Password
    if (!$password) {
        $errorsChampsCon['passwordCon'] = ERROR_REQUIRED_CONN;
    } elseif (mb_strlen($password) < PASSWORD_NUMBER_OF_CHARACTERS_CONN) {
        $errorsChampsCon['passwordCon'] = ERROR_PASSWORD_NUMBER_OF_CHARACTERS_CONN;
    }


    // Vérification si l'ont exécute le code
    if ($email && (mb_strlen($password) >= PASSWORD_NUMBER_OF_CHARACTERS_CONN)) {
        //  Préparer la requète SQL
        $sql = 'SELECT * FROM user WHERE email = :email;';

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

        // Si résultat alors compte sinon pas de compte
        if ($nb == 1) {
            // Les datas reçues sont stockées dans un tableau associatif (clé/valeur) grâce à l'option PDO::FETCH_ASSOC définie lors l'instanciation de mon instance de connexion
            $data = $db_statement->fetch();

            // Comparer le hash du mot de passe saisi avec le hash provenant de la BDD avec l'appel à la fonction password_verify()
            // var_dump('toto');
            // var_dump($password);
            // var_dump($data['password']);
            // var_dump(password_verify($password, $data['password']));
            if (password_verify($password, $data['password'])) {
                if ($data['id_role'] === 1) {
                    // Valider la connexion pour les utilisateurs
                    $_SESSION['userId'] = $data['id'];
                    $_SESSION['admin'] = '';
                    header('location: ./home.php');
                    exit();
                } elseif ($data['id_role'] === 2) {
                    // Valider la connexion pour les administrateurs
                    $_SESSION['userId'] = $data['id'];
                    $_SESSION['admin'] = 'isAdmin';
                    header('location: /view/dashboard.php');
                    exit();
                } else {
                    header('location: /index.php');
                    exit();
                }
            } else {
                // Si le mot de passe est erronné
                $errorsChampsCon['messageError'] = ERROR_PASSWORD_CONN;
                $_SESSION['errorMessageCon'] = $errorsChampsCon;
                header('Location: ../index.php#conn');
                exit();
            }
        } else {
            $errorsChampsCon['messageError'] = ERROR_ACCOUNT;
            $_SESSION['errorMessageCon'] = $errorsChampsCon;
            header('Location: ../index.php#conn');
            exit();
        }
    } else {
        $_SESSION['errorMessageCon'] = $errorsChampsCon;
        header('Location: ../index.php#conn');
        exit();
    }
}
