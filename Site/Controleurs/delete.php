<?php
// Site/Controleurs/delete.php

// 1. Chemin corrigé vers la racine pour config.php
require '../../config.php'; 

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID invalide");
}

$id = (int) $_GET['id'];

// 🔹 Récupérer l’image du produit avant de le supprimer de la base
try {
    $stmt = $pdo->prepare("SELECT URL_PHOTO FROM Produit WHERE Id_Produit = ?");
    $stmt->execute([$id]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produit) {
        die("Produit introuvable");
    }

    // 🔹 Supprimer le fichier image physiquement sur le serveur
    // Chemin corrigé : Site/Controleurs/../uploads/ -> Site/uploads/
    $imagePath = __DIR__ . "/../uploads/" . $produit['URL_PHOTO'];
    if (!empty($produit['URL_PHOTO']) && file_exists($imagePath)) {
        unlink($imagePath);
    }

    // 🔹 Suppression des dépendances (Clés étrangères)
    // On garde toutes vos lignes utiles pour éviter les erreurs de contrainte
    $pdo->prepare("DELETE FROM Contient WHERE Id_Produit = ?")->execute([$id]);
    $pdo->prepare("DELETE FROM Appliquer WHERE Id_Produit = ?")->execute([$id]);
    $pdo->prepare("DELETE FROM Possede WHERE Id_Produit = ?")->execute([$id]);
    $pdo->prepare("DELETE FROM Stock WHERE Id_Produit = ?")->execute([$id]);

    // 🔹 Supprimer le produit de la table principale
    $pdo->prepare("DELETE FROM Produit WHERE Id_Produit = ?")->execute([$id]);

    // 🔹 Redirection vers la vue d'administration
    // Chemin corrigé : remonte vers Site/Vues/admin/produits_admin.php
    header("Location: ../Vues/admin/produits_admin.php?success=delete");
    exit;

} catch (PDOException $e) {
    die("Erreur lors de la suppression : " . $e->getMessage());
}