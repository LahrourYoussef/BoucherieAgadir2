<?php
// Site/Controleurs/details_produits.php

require_once __DIR__ . '/../../config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Redirection vers la liste si l'ID est manquant ou n'est pas un nombre
    header("Location: " . ROOT_URL . "Site/Controleurs/liste_produits.php");
    exit;
}

$id = (int) $_GET['id'];

try {
    
    $stmt = $pdo->prepare("
        SELECT 
            p.*, 
            o.Pays, 
            tp.Nom_Type_Produit, 
            tv.Nom_Type_Viande, 
            sc.Nom_Sous_Categorie
        FROM Produit p
        JOIN Origine o ON p.Id_Origine = o.Id_Origine
        JOIN Type_Produit tp ON p.Id_Type_Produit = tp.Id_Type_Produit
        JOIN Type_Viande tv ON p.Id_Type_Viande = tv.Id_Type_Viande
        JOIN Sous_Categorie sc ON p.Id_Sous_Categorie = sc.Id_Sous_Categorie
        WHERE p.Id_Produit = ?
    ");

    $stmt->execute([$id]);
    $produit = $stmt->fetch();

    if (!$produit) {
        die("Désolé, ce produit n'est plus disponible ou n'existe pas.");
    }

    include '../Vues/produit_view.php';

} catch (PDOException $e) {
    // En cas d'erreur de base de données
    die("Une erreur est survenue lors de la récupération des détails du produit.");
}