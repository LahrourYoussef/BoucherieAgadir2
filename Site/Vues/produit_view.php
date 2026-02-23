<?php require_once __DIR__ . '/../../config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($produit['Nom_Produit']) ?> - Boucherie Agadir</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>Site/Styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>

    <main class="product-container">
        <div class="product-wrapper">
            <div class="product-visual">
                <div class="origin-badge"><?= htmlspecialchars($produit['Pays']) ?></div>
                <img src="<?= ROOT_URL ?>Site/uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>" alt="<?= htmlspecialchars($produit['Nom_Produit']) ?>" class="main-image">
            </div>
            
            <section class="product-details">
                <nav class="breadcrumb">Produits > <?= htmlspecialchars($produit['Nom_Type_Viande']) ?></nav>
                
                <h1 class="product-title-bold"><?= htmlspecialchars($produit['Nom_Produit']) ?></h1>
                
                <div class="price-container">
                    <span class="main-price"><?= number_format($produit['Prix_Unitaire'], 2) ?> €</span>
                    <span class="price-unit">/ <?= htmlspecialchars($produit['Unite_Vente']) ?></span>
                    <?php if ($produit['Prix_KG']): ?>
                        <p class="secondary-price"><?= number_format($produit['Prix_KG'], 2) ?> € le kilo</p>
                    <?php endif; ?>
                </div>

                <div class="attributes-grid">
                    <div class="attribute-item">
                        <span class="attr-label">Type</span>
                        <span class="attr-value"><?= htmlspecialchars($produit['Nom_Type_Produit']) ?></span>
                    </div>
                    <div class="attribute-item">
                        <span class="attr-label">Viande</span>
                        <span class="attr-value"><?= htmlspecialchars($produit['Nom_Type_Viande']) ?></span>
                    </div>
                    <div class="attribute-item">
                        <span class="attr-label">Catégorie</span>
                        <span class="attr-value"><?= htmlspecialchars($produit['Nom_Sous_Categorie']) ?></span>
                    </div>
                </div>

                <p class="description-text"><?= nl2br(htmlspecialchars($produit['Description_Produit'])) ?></p>

                <div class="purchase-zone">
                    <a href="<?= ROOT_URL ?>Site/Controleurs/add_to_cart.php?id=<?= $produit['Id_Produit'] ?>" class="btn-primary-cart btn-cart">
                        Ajouter au panier
                    </a>
                    <a href="<?= ROOT_URL ?>Site/Controleurs/liste_produits.php" class="btn-secondary-back">
                        ← Retour à la boutique
                    </a>
                </div>
            </section>
        </div>
    </main>
 
 <?php include __DIR__ . '/footer.php'; ?>

    <script src="<?= ROOT_URL ?>Site/js/script.js"></script>

</body>
</html>