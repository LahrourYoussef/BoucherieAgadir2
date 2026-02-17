<?php
// Démarrage de la session pour accéder au panier
session_start();

// Inclusion de la configuration pour utiliser ROOT_URL
require_once __DIR__ . '/../../config.php';

// Vérification que les données nécessaires sont bien envoyées via POST
if (isset($_POST['id'], $_POST['quantite'])) {
    $id = (int) $_POST['id'];
    $qte = (int) $_POST['quantite'];

    // Si la quantité est mise à 0 ou moins, on retire le produit du panier
    if ($qte <= 0) {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    } else {
        // Sinon, on met à jour la quantité si le produit existe bien dans le panier
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantite'] = $qte;
        }
    }
}

// Redirection vers la page du panier en utilisant ROOT_URL
// Standardisation sur panier.php qui est le nom utilisé dans vos vues
header("Location: " . ROOT_URL . "Site/Controleurs/panier.php");
exit;
?>