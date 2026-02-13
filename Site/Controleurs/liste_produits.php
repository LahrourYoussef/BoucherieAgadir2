<?php
require_once __DIR__ . '/../../config.php'; // Connexion

try {
    // Ici on ne met PAS de LIMIT car on veut tout voir
    $stmt = $pdo->query("SELECT * FROM Produit ORDER BY Id_Produit DESC");
    $posts = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

include '../Vues/liste_produit.php';