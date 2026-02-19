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

<footer class="footer" role="contentinfo">
    <div class="footer-container">
        <div class="footer-brand">
            <div class="footer-logo">
                <img src="<?= ROOT_URL ?>Site/images/Logo.webp" alt="Logo" width="60">
            </div>
            <div class="footer-socials">
                <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram">
                    <img src="<?= ROOT_URL ?>Site/images/instagram.png" alt="Instagram" width="24">
                </a>
                <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok">
                    <img src="<?= ROOT_URL ?>Site/images/tiktok.png" alt="TikTok" width="26">
                </a>
            </div>
        </div>

        <div class="footer-links-group">
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="<?= ROOT_URL ?>index.php#accueil">Accueil</a></li>
                    <li><a href="<?= ROOT_URL ?>Site/Controleurs/liste_produits.php">Nos produits</a></li>
                    <li><a href="<?= ROOT_URL ?>Site/Vues/Promotions.php">Promotions</a></li>
                    <li><a href="<?= ROOT_URL ?>Site/Vues/ClickAndCollect.php">Click & Collect</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h2>Horaires</h2>
                <p>Mar - Sam : 09h30 - 13h00 / 15h30 - 19h00</p>
                <p>Vendredi : 09h30 - 12h30 / 15h30 - 19h00</p>
            </div>

            <div class="footer-section">
                <h2>Contact</h2>
                <p>06 27 29 85 56</p>
                <p>14 Pl. du Béarn, 64150 Mourenx</p>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p class="copyright">
            <a href="<?= ROOT_URL ?>Site/Vues/cgu.php">CGU</a> • 
            <a href="<?= ROOT_URL ?>Site/Vues/rgpd.php">RGPD</a> • 
            <a href="<?= ROOT_URL ?>Site/Vues/mentions-legales.php">Mentions légales</a>
        </p>
    </div>
</footer>

<script src="<?= ROOT_URL ?>Site/js/script.js"></script>

</body>
</html>