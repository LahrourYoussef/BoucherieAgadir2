<?php
session_start();
require 'config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Produit invalide");
}

$id = (int) $_GET['id'];

// Récupérer le produit
$stmt = $pdo->prepare("SELECT * FROM Produit WHERE Id_Produit = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch();

if (!$produit) {
    die("Produit introuvable");
}

// Initialiser panier
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Si produit déjà dans panier → +1
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantite'] += 1;
} else {
    $_SESSION['cart'][$id] = [
        'id' => $produit['Id_Produit'],
        'nom' => $produit['Nom_Produit'],
        'prix' => $produit['Prix_Unitaire'],
        'photo' => $produit['URL_PHOTO'],
        'unite' => $produit['Unite_Vente'],
        'quantite' => 1
    ];
}

header("Location: " . ROOT_URL . "Site/Controleurs/panier.php");
exit;
