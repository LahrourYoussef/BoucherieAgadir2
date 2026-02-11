<?php
// Site/Controleurs/liste_produits.php

// 1. On appelle la connexion (Modèle)
require_once '../config.php'; 

// 2. Logique de récupération des données
try {
    $stmt = $pdo->query("
        SELECT 
            p.Id_Produit, p.Nom_Produit, p.Description_Produit,
            p.Prix_Unitaire, p.Prix_KG, p.URL_PHOTO, p.Unite_Vente,
            o.Pays, tp.Nom_Type_Produit, tv.Nom_Type_Viande, sc.Nom_Sous_Categorie
        FROM Produit p
        JOIN Origine o ON p.Id_Origine = o.Id_Origine
        JOIN Type_Produit tp ON p.Id_Type_Produit = tp.Id_Type_Produit
        JOIN Type_Viande tv ON p.Id_Type_Viande = tv.Id_Type_Viande
        JOIN Sous_Categorie sc ON p.Id_Sous_Categorie = sc.Id_Sous_Categorie
        ORDER BY p.Id_Produit DESC
    ");
    $posts = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur lors de la récupération : " . $e->getMessage());
}

// 3. On appelle la Vue pour afficher les données
include '../Vues/vueClient.php';