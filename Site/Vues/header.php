<?php
// Sécurité : On démarre la session uniquement si elle n'est pas déjà lancée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// On inclut le fichier de config pour avoir ROOT_URL et la connexion PDO
// Le chemin remonte de Vues/ vers la racine
require_once __DIR__ . '/../../config.php';
?>

<header class="header" role="banner">
    <div class="header-container">
        <div class="logo">
            <a href="<?= ROOT_URL ?>index.php">
                <img src="<?= ROOT_URL ?>Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px">
            </a>
        </div>
        
        <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        
        <nav class="nav" role="navigation">
            <a href="<?= ROOT_URL ?>index.php#histoire" class="nav-link">La Boucherie</a>
            <a href="<?= ROOT_URL ?>Site/Controleurs/liste_produits.php" class="nav-link">Nos produits</a>
            <a href="<?= ROOT_URL ?>Site/Vues/Promotions.php" class="nav-link">Promotions</a>
            <a href="<?= ROOT_URL ?>Site/Vues/ClickAndCollect.php" class="nav-link">Click & Collect</a>
            <a href="<?= ROOT_URL ?>Site/Vues/Contact.php" class="nav-link">Contact</a>
        </nav>
        
        <div class="icons">
            <a href="<?= ROOT_URL ?>Site/Controleurs/panier.php" class="cart-button" aria-label="Panier">
                <img src="<?= ROOT_URL ?>Site/images/panier.svg" alt="Panier" class="icon-cart" />
                <span class="cart-badge show" aria-hidden="true">
                    <?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantite')) : 0 ?>
                </span>
            </a>

            <a href="<?= ROOT_URL ?>Site/Controleurs/admin/auth.php" class="cart-button" aria-label="Mon Compte">
                <img src="<?= ROOT_URL ?>Site/images/compte2.png" alt="Compte" class="icon-account" />
            </a>
        </div>
    </div>
</header>