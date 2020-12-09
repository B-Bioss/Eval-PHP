<?php


if (!array_key_exists('id_logement', $_GET) || !isset($_GET['id_logement'])){
    echo 'Problème de transmission du numéro client.';
    exit;
}

// $productId = (int) $_GET['id'];
$id_logement = intval($_GET['id_logement']);

/********************************************/
/*  Connexion à la base de données avec PDO */
/********************************************/

// On stocke les informations de connexion dans des constantes
const DB_HOST = 'localhost';
const DB_NAME = 'immobilier';
const DB_USER = 'root';
const DB_PASSWORD = '';

// Construction du Data Source Name
$dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;

// Tableau d'options pour la connexion PDO
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

// Création de la connexion PDO (création d'un objet PDO)
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
$pdo->exec('SET NAMES UTF8');

/**********************************
 * Requête de sélection du Bien-imo
 *********************************/ 

// Requête SQL de sélection du bien
$sql = 'SELECT id_logement AS id_logement, titre, adresse, ville, cp, surface, prix, photo, type, description
            FROM logement
            WHERE id_logement = ?';


$query = $pdo->prepare($sql);
$query->execute([$id_logement]);

$results = $query->fetch();


// Affichage
include 'product-details.phtml';

