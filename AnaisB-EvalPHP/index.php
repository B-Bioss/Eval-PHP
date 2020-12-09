<?php


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

// Requête SQL pour selectionner tous les éléments de la table products
$sql = 'SELECT id_logement, titre, adresse, ville, cp, surface, prix, photo, type, description
        FROM logement';

// Préparation et exécution de la requête SQL
$query = $pdo->prepare($sql);
$query->execute();

// Récupération de TOUS les résultats d'un coup avec la méthode fetchAll()
$results = $query->fetchAll();




// Affichage : inclusion du template index.phtml
include './index.phtml';