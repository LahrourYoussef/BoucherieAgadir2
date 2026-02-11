<?php
// Site/Controleurs/details_produit.php
require_once '../config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Produit invalide");
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("
    SELECT 
        p.*, o.Pays, tp.Nom_Type_Produit, tv.Nom_Type_Viande, sc.Nom_Sous_Categorie
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
    die("Produit introuvable");
}

// On appelle la vue pour l'affichage
include '../Vues/produit_view.php';