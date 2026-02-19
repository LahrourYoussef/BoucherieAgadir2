<?php
session_start();
// Chemin vers la racine pour config.php
require_once __DIR__ . '/../../config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Produit invalide");
}

$id = (int) $_GET['id'];

// Récupérer le produit dans la base
$stmt = $pdo->prepare("SELECT * FROM Produit WHERE Id_Produit = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch();

if (!$produit) {
    die("Produit introuvable");
}

// Initialiser le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ajouter ou incrémenter la quantité
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

// --- RÉPONSE AJAX (Invisible) ---
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'cartCount' => array_sum(array_column($_SESSION['cart'], 'quantite'))
    ]);
    exit;
}

// --- REDIRECTION CLASSIQUE (Si JS est désactivé) ---
header("Location: " . ROOT_URL . "Site/Controleurs/panier.php");
exit;