<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($produit['Nom_Produit']) ?> - Boucherie Agadir</title>
    <link rel="stylesheet" href="../Styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        a { text-decoration: none; }
        .product-page { display:grid; grid-template-columns:1fr 1fr; gap:40px; padding:50px; }
        .product-main-img { width:100%; border-radius:20px; }
        .product-right h1 { font-size:32px; }
        .product-actions { margin-top:30px; display:flex; justify-content: space-between; }
        .btn-cart { padding:12px 20px; background:#D10F1C; color:#fff; border:none; border-radius:20px; cursor:pointer; text-decoration: none; }
        .btn-back { padding:12px 20px; border:1px solid #ccc; border-radius:20px; text-decoration:none; color:#111; }
        
        @media (max-width: 768px) {
            .product-page { grid-template-columns: 1fr; padding: 20px; }
        }
    </style>
</head>
<body>

    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
                <img src="../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" > 
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="#boucherie" class="nav-link">La Boucherie</a>
                <a href="#produits" class="nav-link">Nos produits</a>
                <a href="#promotions" class="nav-link">Promotions</a>
                <a href="#click-collect" class="nav-link">Click & Collect</a>
                <a href="#contact" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="../images/panier.svg" alt="Panier" class="icon" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <div class="product-page">
            <div class="product-left">
                <img src="../uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>" class="product-main-img">
            </div>
            
            <section class="product-page-section">
                <div class="product-right">
                    <h1><?= htmlspecialchars($produit['Nom_Produit']) ?></h1>
                    <p class="product-description"><?= htmlspecialchars($produit['Description_Produit']) ?></p>

                    <div class="product-info">
                        <p><b>Prix :</b> <?= htmlspecialchars($produit['Prix_Unitaire']) ?> € / <?= htmlspecialchars($produit['Unite_Vente']) ?></p>

                        <?php if ($produit['Prix_KG']): ?>
                            <p><b>Prix au KG :</b> <?= htmlspecialchars($produit['Prix_KG']) ?> €</p>
                        <?php endif; ?>

                        <p><b>Origine :</b> <?= htmlspecialchars($produit['Pays']) ?></p>
                        <p><b>Type :</b> <?= htmlspecialchars($produit['Nom_Type_Produit']) ?></p>
                        <p><b>Viande :</b> <?= htmlspecialchars($produit['Nom_Type_Viande']) ?></p>
                        <p><b>Catégorie :</b> <?= htmlspecialchars($produit['Nom_Sous_Categorie']) ?></p>
                    </div>

                    <div class="product-actions">
                        <a href="../Controleurs/add_to_cart.php?id=<?= $produit['Id_Produit'] ?>" class="btn-cart">
                            Ajouter au panier
                        </a>
                        <a href="../../index.php" class="btn-back">← Retour boutique</a>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer class="footer" role="contentinfo">
        <div class="footer-container">
    
            <!-- LOGO + DESCRIPTION -->
            <div class="footer-section">
                    <img src="../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" >
    
                <div class="footer-socials">
                    <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram"><img src="../images/instagram.png" alt="Instagram" style="width: 33px; height: 33px;"></a>
                    <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok"><img src="../images/tiktok.png" alt="TikTok" style="width: 36px; height: 36px;"></a>
                </div>
            </div>
    
            <!-- PLAN DU SITE -->
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="../../index.php#accueil">Accueil</a></li>
                    <li><a href="../../index.php#histoire">Notre histoire</a></li>
                    <li><a href="../../index.php#produits">Nos produits</a></li>
                    <li><a href="Promotions.php">Promotions</a></li>
                    <li><a href="ClickAndCollect.php">Click & Collect</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                </ul>
            </div>
    
            <!-- HORAIRES -->
            <div class="footer-section">
                <h2>Horaires</h2>
                <p>Lundi : Fermé</p>
                <p>Mardi : 09h30 - 13h00,<br> 15h30 - 19h00</p>
                <p>Mercredi : 09h30 - 13h00,<br> 15h30 - 19h00</p>
                <p>Jeudi : 09h30 - 13h00,<br> 15h30 - 19h00</p>
                <p>Vendredi : : 09h30 - 12h30,<br> 15h30 - 19h00</p>
                <p>Samedi : 09h30 - 13h00,<br> 15h30 - 19h00</p>
                <p>Dimanche : Fermé</p>
            </div>
    
            <!-- CONTACT -->
            <div class="footer-section">
                <h2>Contact</h2>
                <p>Ben20mohamed97@gmail.com</p>
                <p>06 27 29 85 56</p>
                <p>14 Pl. du Béarn, 64150 Mourenx</p>
            </div>
    
            <!-- GOOGLE MAPS -->
            <div class="footer-section footer-map">
                <h2>Nous trouver</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2900.2743678430566!2d-0.6325365231790336!3d43.37128687111703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd56f651ffc7de2b%3A0x499ef61367106771!2s14%20Pl.%20du%20B%C3%A9arn%2C%2064150%20Mourenx!5e0!3m2!1sfr!2sfr!4v1768483752878!5m2!1sfr!2sfr" 
                loading="lazy" >
                </iframe>
            </div>
    
        </div>
    
        <!-- BOTTOM -->
        <div class="footer-bottom">
            <p class="copyright">
                Tous droits réservés • 
                <a href="#">CGU</a> • 
                <a href="#">RGPD</a> • 
                <a href="#">Mentions légales</a>
            </p>
            
        </div>
    </footer>

    <script>
        // Menu mobile
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        menuToggle.addEventListener('click', () => {
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
        });

        // Header scroll
        const header = document.querySelector('.header');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) header.classList.add('header-scrolled');
            else header.classList.remove('header-scrolled');
        });
    </script>
</body>
</html>