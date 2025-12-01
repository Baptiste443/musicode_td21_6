<?php

// Récupération sécurisée des variables d'environnement
$host = getenv('DB_HOST') ?: 'localhost';
$dbname = getenv('DB_NAME') ?: 'ecogestum';
$user = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';

function connection() {
    global $host, $dbname, $user, $password;

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        // Retour JSON pour le JS si problème de connexion
        echo json_encode(["error" => "Erreur de connexion : " . $e->getMessage()]);
        exit;
    }
}
?>