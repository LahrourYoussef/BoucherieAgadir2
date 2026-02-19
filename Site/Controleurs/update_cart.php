<?php
session_start();
require_once __DIR__ . '/../../config.php';

if (isset($_POST['id'], $_POST['quantite'])) {
    $id = (int) $_POST['id'];
    $qte = (int) $_POST['quantite'];

    if ($qte <= 0) {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    } else {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantite'] = $qte;
        }
    }
}

// --- RÉPONSE AJAX ---
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // On arrête juste le script, le JS s'occupe de l'affichage
    exit;
}

// --- REDIRECTION CLASSIQUE ---
header("Location: " . ROOT_URL . "Site/Controleurs/panier.php");
exit;