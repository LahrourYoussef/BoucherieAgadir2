<?php require_once __DIR__ . '/../../config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boucherie Agadir - Tous nos produits</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>Site/Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>

    <main style="padding-top: 50px; min-height: 600px;">
        <section class="products-section">
            <h1 style="text-align:center; margin-bottom: 40px;">Tous nos produits</h1>
            <div class="gallery">
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $produit): ?>
                    <div class="product-card">
                        <img src="<?= ROOT_URL ?>Site/uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>" class="product-img" alt="<?= htmlspecialchars($produit['Nom_Produit']) ?>">
                        
                        <div class="product-info">  
                            <h3 class="product-title"><?= htmlspecialchars($produit['Nom_Produit']) ?></h3>
                            <p class="product-desc"><?= htmlspecialchars($produit['Description_Produit']) ?></p>
                            
                            <div class="product-meta1">
                                <p class="product-meta" style="font-weight: 800; color: #D10F1C; font-size: 1.2rem;">
                                    <?= number_format($produit['Prix_Unitaire'], 2) ?> €
                                </p>
                                
                                <div style="display: flex; gap: 8px; margin-top: 10px;">
                                    <a href="<?= ROOT_URL ?>Site/Controleurs/details_produits.php?id=<?= $produit['Id_Produit'] ?>" class="btn-view">Détails</a>
                                    
                                    <a href="<?= ROOT_URL ?>Site/Controleurs/add_to_cart.php?id=<?= $produit['Id_Produit'] ?>" 
                                       class="btn-cart" 
                                       style="background: #D10F1C; color: #fff; padding: 8px 12px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.85rem;">
                                       + Ajouter
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align:center; grid-column: 1 / -1;">Aucun produit trouvé actuellement.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php include __DIR__ . '/footer.php'; ?>

<script src="<?= ROOT_URL ?>Site/js/script.js"></script>

</body>
</html>