<?php
// Démarrage de la session pour accéder au panier
session_start();

// Inclusion de la configuration pour utiliser ROOT_URL
require_once __DIR__ . '/../../config.php';

// Vérification de la présence d'un ID valide dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Si le produit existe dans le panier, on le supprime
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
}

// Redirection vers la page du panier en utilisant ROOT_URL
// Note : Le fichier final s'appelle souvent panier.php ou cart.php selon votre contrôleur
header("Location: " . ROOT_URL . "Site/Controleurs/panier.php");
exit;