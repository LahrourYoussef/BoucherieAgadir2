<?php
// Site/Controleurs/panier.php
session_start();
require_once '../config.php';

// On récupère le panier en session
$cart = $_SESSION['cart'] ?? [];
$total = 0;

// On appelle la vue
include '../Vues/panier_view.php';