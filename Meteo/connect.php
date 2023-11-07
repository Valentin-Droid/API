<?php
session_start();

$host = 'localhost';
$dbname = 'projet_api_weather';

try {
    $PDO= new PDO("mysql:host=$host;dbname=$dbname", 'root', '');
   $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

?>