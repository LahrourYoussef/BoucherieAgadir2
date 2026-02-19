<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boucherie Agadir - Tous nos produits</title>
    <link rel="stylesheet" href="/Site/Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
               <a href="/index.php"><img src="/Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="/index.php#histoire" class="nav-link">Notre histoire</a>
                <a href="/Site/Controleurs/liste_produits.php" class="nav-link">Nos produits</a>
                <a href="/Site/Vues/Promotions.php" class="nav-link">Promotions</a>
                <a href="/Site/Vues/ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="/Site/Vues/Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
               <button class="cart-button" aria-label="Panier d'achat">
    <img src="../../Site/images/panier.svg" alt="Panier" class="icon-cart" />
    <span class="cart-badge" aria-hidden="true">0</span>
</button>
                <a href="../../Site/Controleurs/admin/auth.php" class="cart-button" aria-label="Mon Compte">
                    <img src="../../Site/images/compte2.png" alt="Compte" class="icon-account" />
                </a>
            </div>
        </div>
    </header>

    <main style="padding-top: 50px;">
        <section class="products-section">
            <center><h1>Tous nos produits</h1></center>
            <div class="gallery">
                <?php if (!empty($posts)): // $posts vient du contrôleur ?>
                    <?php foreach ($posts as $produit): ?>
                    <div class="product-card">
                        <img src="../uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>" class="product-img">
                        <div class="product-info">  
                            <h3 class="product-title"><?= htmlspecialchars($produit['Nom_Produit']) ?></h3>
                            <p class="product-desc"><?= htmlspecialchars($produit['Description_Produit']) ?></p>
                            <div class="product-meta1">
                                <p class="product-meta"><?= htmlspecialchars($produit['Prix_Unitaire']) ?> €</p>
                                <a href="../Controleurs/details_produits.php?id=<?= $produit['Id_Produit'] ?>" class="btn-view">Détails</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align:center;">Aucun produit trouvé.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>



<footer class="footer" role="contentinfo">
    <div class="footer-container">

        <div class="footer-brand">
            <div class="footer-logo">
                <img src="/Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="60">
            </div>
            <div class="footer-socials">
                <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram">
                    <img src="/Site/images/instagram.png" alt="Instagram" width="24" height="24">
                </a>
                <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok">
                    <img src="/Site/images/tiktok.png" alt="TikTok" width="26" height="26">
                </a>
            </div>
        </div>

        <div class="footer-links-group">
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="/index.php#accueil">Accueil</a></li>
                    <li><a href="/index.php#histoire">Notre histoire</a></li>
                    <li><a href="/Site/Controleurs/liste_produits.php">Nos produits</a></li>
                    <li><a href="/Site/Vues/Promotions.php">Promotions</a></li>
                    <li><a href="/Site/Vues/ClickAndCollect.php">Click & Collect</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h2>Horaires</h2>
                <p>Lun & Dim : Fermé</p>

                <p>Mar - Sam : 09h30 - 13h00</p>
                <p>15h30 - 19h00</p>
                <p>Vendredi : : 09h30 - 12h30,<br> 15h30 - 19h00</p>
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
            
            <a href="/Site/Vues/cgu.php">CGU</a> • 
            <a href="/Site/Vues/rgpd.php">RGPD</a> • 
            <a href="/Site/Vues/mentions-legales.php">Mentions légales</a>
        </p>
    </div>
</footer>

</body>
</html>