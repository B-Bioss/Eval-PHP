<?php


// Initialisations
$errors = null;
$titre = null;
$adresse = null;
$cd = null;
$ville = null;
$surface = null;
$prix = null;
$photo = null;
$type = null;
$description = null;

// Si le formulaire est soumis... 
if (!empty($_POST)) {

    // On récupère les données 
    $titre = $_POST['titre'];
    $adresse = $_POST['adresse'];
    $cd = $_POST['cd'];
    $ville = $_POST['ville'];
    $surface = $_POST['surface'];
    $prix = $_POST['prix'];
    $photo = $_POST['photo'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    // Validation des données
    $errors = validateProductForm($titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type, $description);

    // Si tout est OK
    if (empty($errors)) {

        // Insertion du bien dans la BDD
        insertProduct($titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type, $description);

        // Message flash puis redirection vers le dashboard admin
        addFlashMessage('Le bien correctement ajouté');
        header('Location: index.php');
        exit;
    }
        
}



function validateProductForm($titre, $adresse, $ville, $cp, $surface, $prix, $type, $description)
{
    $errors = [];

    if (!$titre) {
        $errors[] = 'Le titre du bien est obligatoire';
    }

    if (!$description) {
        $errors[] = 'Le description du bien est obligatoire';
    }

    if (!$adresse) {
        $errors[] = "L'adresse du bien est obligatoire";
    }

    if (!$ville) {
        $errors[] = 'La ville du bien est obligatoire';
    }

    if (!$type) {
        $errors[] = 'Le type est obligatoire';
    }

    if (!$cp) {
        $errors[] = 'Le code postal est obligatoire';
    }
    else if (!ctype_digit($cp) || $cp < 1000) {
        $errors[] = 'La valeur du code postal est incorrecte';
    }

    if (!$prix) {
        $errors[] = 'Le prix est obligatoire';
    }
    else if (!is_numeric($prix) || $prix < 0) {
        $errors[] = 'La valeur du prix est incorrecte';
    }

    if (!$surface) {
        $errors[] = 'La surface du bien est obligatoire';
    }
    else if (!ctype_digit($surface) || $surface < 0) {
        $errors[] = 'La surface du bien est incorrecte';
    }

    return $errors;
}

function insertProduct($titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type, $description)
{
    // Insertion de l'utilisateur en BDD
    $sql = 'INSERT INTO logement (id_logement, titre, adresse, ville, cp, surface, prix, photo, type, description)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

    prepareAndExecuteQuery($sql, [$titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type, $description]);        
}
/**
 * Prépare et exécute une requête SQL
 */
function prepareAndExecuteQuery(string $sql, array $criteria = []): PDOStatement
{
    // Connexion PDO
    $pdo = getPDOConnection();

    // Préparation de la requête SQL
    $query = $pdo->prepare($sql);

    // Exécution de la requête
    $query->execute($criteria);

    // Retour du résultat
    return $query;
}

function getPDOConnection()
{
    // Construction du Data Source Name
    $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;

    // Tableau d'options pour la connexion PDO
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Création de la connexion PDO (création d'un objet PDO)
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    $pdo->exec('SET NAMES UTF8');

    return $pdo;
}

/******************************
 * GESTION DES MESSAGES FLASH
 ******************************/


function initFlashbag()
{
    // Si aucune session n'est encore démarrée ...
    if (session_status() === PHP_SESSION_NONE) {

        // ... alors on en démarre une
        session_start();
    } 

    // Si la clé 'flashbag' n'existe pas en session ou si elle n'est pas définie... 
    if (!array_key_exists('flashbag', $_SESSION) || !isset($_SESSION['flashbag'])) {

        // ... alors on range dans la clé 'flashbag' un tableau vide
        $_SESSION['flashbag'] = [];
    }
}

/**
 * Ajout un message flash au flashbag en session
 */
function addFlashMessage(string $message)
{
    // Initialisation du flashbag
    initFlashbag();

    // On ajoute dans le tableau de message le message passé en paramètre
    // $_SESSION['flashbag'][] = $message;
    array_push($_SESSION['flashbag'], $message);
}




// Affichage
include 'create-product.phtml';
