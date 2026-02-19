<?php
// Site/Vues/admin/produits_admin.php
require_once '../../../config.php';

// Récupération des produits avec jointures pour avoir les noms au lieu des IDs
try {
    $stmt = $pdo->query("SELECT p.*, o.Pays, tp.Nom_Type_Produit, tv.Nom_Type_Viande, sc.Nom_Sous_Categorie 
                         FROM Produit p
                         JOIN Origine o ON p.Id_Origine = o.Id_Origine
                         JOIN Type_Produit tp ON p.Id_Type_Produit = tp.Id_Type_Produit
                         JOIN Type_Viande tv ON p.Id_Type_Viande = tv.Id_Type_Viande
                         JOIN Sous_Categorie sc ON p.Id_Sous_Categorie = sc.Id_Sous_Categorie
                         ORDER BY p.Id_Produit DESC");
    $posts = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des Produits - Boucherie Agadir</title>
    <link rel="stylesheet" href="../../Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
</head>
<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="../../../index.php"><img src="../../images/Logo.webp" alt="Logo" width="45"></a>
            </div>
            <nav class="nav">
                <a href="menuGestion.php" class="nav-link">Tableau de bord</a>
                <a href="../../../index.php" class="nav-link">Voir le site</a>
            </nav>
            <div class="icons">
                <button class="cart-button">
                    <img src="../../images/panier.svg" alt="Panier" class="icon-cart">
                    <span class="cart-badge">0</span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <div class="admin-header">
            <h1>Gestion de la Galerie</h1>
            <a href="../../Vues/admin/add.php" class="add-btn">➕ Nouveau Produit</a>
        </div>

        <div class="admin-header">
            <h2>Liste des produits en ligne</h2>
        </div>

        <div class="gallery">
            <?php if (empty($posts)): ?>
                <p style="text-align:center; color:#555; grid-column: 1 / -1;">Aucun produit trouvé.</p>
            <?php else: ?>
                <?php foreach ($posts as $produit): ?>
                <div class="admin-card">
                    <img src="../../uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>" alt="Photo">
                    <div class="product-info"> 
                        <div class="product-title"><?= htmlspecialchars($produit['Nom_Produit']) ?></div>
                        <p class="product-desc"><?= htmlspecialchars($produit['Description_Produit']) ?></p>
                        <p class="product-meta"><b>Prix :</b> <?= $produit['Prix_Unitaire'] ?> € / <?= htmlspecialchars($produit['Unite_Vente']) ?></p>
                        <p class="product-meta"><b>Origine :</b> <?= htmlspecialchars($produit['Pays']) ?></p>
                        <p class="product-meta"><b>Viande :</b> <?= htmlspecialchars($produit['Nom_Type_Viande']) ?></p>
                        
                        <div class="actions">
                            <a href="edit.php?id=<?= $produit['Id_Produit'] ?>" class="edit">✏️ Modifier</a>
                            <a href="../../Controleurs/delete.php?id=<?= $produit['Id_Produit'] ?>" 
                               class="delete" 
                               onclick="return confirm('Confirmer la suppression ?')">🗑️ Supprimer</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer" role="contentinfo">
        <div class="footer-container">
            <div class="footer-brand">
                <div class="footer-logo">
                    <img src="../../images/Logo.webp" alt="Logo Boucherie Agadir" width="60">
                </div>
                <div class="footer-socials">
                    <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram">
                        <img src="../../images/instagram.png" alt="Instagram" width="24" height="24">
                    </a>
                    <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok">
                        <img src="../../images/tiktok.png" alt="TikTok" width="26" height="26">
                    </a>
                </div>
            </div>

            <div class="footer-links-group">
                <div class="footer-section">
                    <h2>Plan du site</h2>
                    <ul>
                        <li><a href="../../../index.php#accueil">Accueil</a></li>
                        <li><a href="../../../index.php#histoire">Notre histoire</a></li>
                        <li><a href="../../Controleurs/liste_produits.php">Nos produits</a></li>
                        <li><a href="../Promotions.php">Promotions</a></li>
                        <li><a href="../ClickAndCollect.php">Click & Collect</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h2>Horaires</h2>
                    <p>Lun & Dim : Fermé</p>
                    <p>Mar - Sam : 09h30 - 13h00 / 15h30 - 19h00</p>
                    <p>Vendredi : 09h30 - 12h30 / 15h30 - 19h00</p>
                </div>

                <div class="footer-section">
                    <h2>Contact</h2>
                    <p>Ben20mohamed97@gmail.com</p>
                    <p>06 27 29 85 56</p>
                    <p>14 Pl. du Béarn, 64150 Mourenx</p>
                </div>
            </div>

            <div class="footer-map">
                <h2>Nous trouver</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.123456789!2d-0.6123456789!3d43.37123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd56f123456789%3A0x123456789!2zMTQgUGwuIGR1IELDqWFybiwgNjQxNTAgTW91cmVueA!5e0!3m2!1sfr!2sfr!4v1234567890" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright">
                <a href="../cgu.php">CGU</a> •
                <a href="../rgpd.php">RGPD</a> •
                <a href="../mentions-legales.php">Mentions légales</a>
            </p>
        </div>
    </footer>
</body>
</html>