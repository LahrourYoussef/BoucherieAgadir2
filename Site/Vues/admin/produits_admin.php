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
            <a href="add.php" class="add-btn">➕ Nouveau Produit</a>
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

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <img src="../../images/Logo.webp" alt="Logo" width="50">
            </div>
            <div class="footer-section">
                <h2>Navigation</h2>
                <ul>
                    <li><a href="../../../index.php">Accueil</a></li>
                    <li><a href="../../Controleurs/liste_produits.php">Nos produits</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Contact</h2>
                <p>14 Pl. du Béarn, 64150 Mourenx</p>
                <p>06 27 29 85 56</p>
            </div>
            <div class="footer-section">
                <h2>Légal</h2>
                <ul>
                    <li><a href="../cgu.php">CGU</a></li>
                    <li><a href="../rgpd.php">RGPD</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>