<?php
// Site/Controleurs/gestionProduit.php

// 1. Inclusion de la configuration (accès à la variable $pdo) et du modèle
require_once '../../config.php';
require_once '../Modeles/BaseProduit.php';

// 2. Récupération et sécurisation de l'action (par défaut 'liste')
if (isset($_GET['action'])) {
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $action = "liste";
}

// 3. Logique de gestion des produits
switch ($action) {
    case 'liste':
        // Récupération de tous les produits de la boucherie
        try {
            // On utilise la connexion $pdo définie dans votre fichier config.php
            $stmt = $pdo->query("SELECT * FROM Produit ORDER BY Nom_Produit ASC");
            $lesProduits = $stmt->fetchAll();
        } catch (PDOException $e) {
            $lesProduits = [];
            $error = "Erreur lors de la récupération des produits : " . $e->getMessage();
        }
        
        // Chargement de la vue correspondante
        include_once '../Vues/liste_produit.php';
        break;
    
    case 'rechercher':
        // Récupération du mot-clé de recherche (paramètre 'q' du formulaire)
        $motCle = isset($_GET['q']) ? trim($_GET['q']) : '';

        try {
            // Recherche filtrée par nom ou description (ex: "bœuf", "poulet")
            $stmt = $pdo->prepare("SELECT * FROM Produit WHERE Nom_Produit LIKE ? OR Description_Produit LIKE ?");
            $searchParam = "%$motCle%";
            $stmt->execute([$searchParam, $searchParam]);
            $lesProduits = $stmt->fetchAll();
        } catch (PDOException $e) {
            $lesProduits = [];
            $error = "Erreur lors de la recherche : " . $e->getMessage();
        }

        // Affichage des résultats dans la même vue
        include_once '../Vues/liste_produit.php';
        break;

    default:
        // Redirection vers la liste par défaut si l'action est inconnue
        header("Location: gestionProduit.php?action=liste");
        exit;
}