<?php
// Site/Controleurs/panier.php
session_start();

// Inclusion du fichier de config (remonte de deux niveaux pour atteindre la racine)
require_once __DIR__ . '/../../config.php';

// On récupère le panier en session ou un tableau vide s'il n'existe pas
$cart = $_SESSION['cart'] ?? [];

// Initialisation du total à 0
$total = 0;

// On appelle la vue qui va utiliser $cart, $total et ROOT_URL
// Le chemin remonte d'un niveau (Controleurs) puis descend dans Vues
include __DIR__ . '/../Vues/panier_view.php';