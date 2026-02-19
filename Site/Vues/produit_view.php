<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($produit['Nom_Produit']) ?> - Boucherie Agadir</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>Site/Styles/style.css">
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
                <a href="<?= ROOT_URL ?>index.php"><img src="<?= ROOT_URL ?>Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="<?= ROOT_URL ?>index.php#histoire" class="nav-link">La Boucherie</a>
                <a href="<?= ROOT_URL ?>Site/Controleurs/liste_produits.php" class="nav-link">Nos produits</a>
                <a href="<?= ROOT_URL ?>Site/Vues/Promotions.php" class="nav-link">Promotions</a>
                <a href="<?= ROOT_URL ?>Site/Vues/ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="<?= ROOT_URL ?>Site/Vues/Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
    <img src="Site/images/panier.svg" alt="Panier" class="icon-cart" />
    <span class="cart-badge" aria-hidden="true">0</span>
</button>
                <a href="<?= ROOT_URL ?>Site/Controleurs/admin/auth.php" class="cart-button" aria-label="Mon Compte">
                    <img src="<?= ROOT_URL ?>Site/images/compte2.png" alt="Compte" class="icon-account" />
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="product-page">
            <div class="product-left">
                <img src="<?= ROOT_URL ?>Site/uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>" class="product-main-img">
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
                        <a href="<?= ROOT_URL ?>Site/Controleurs/add_to_cart.php?id=<?= $produit['Id_Produit'] ?>" class="btn-cart">
                            Ajouter au panier
                        </a>
                        <a href="<?= ROOT_URL ?>Site/Controleurs/liste_produits.php" class="btn-back">← Retour boutique</a>
                    </div>
                </div>
            </section>
        </div>
    </main>

   <style>
    /* Styles spécifiques au Footer */
    .footer {
        background: #ffffff;
        color: #1a1a1a;
        padding: 60px 0 20px;
        font-family: "Inter", sans-serif;
        border-top: 1px solid #f0f0f0;
    }

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 40px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 40px;
        flex-wrap: wrap;
    }

    /* GAUCHE : Logo et Réseaux */
    .footer-brand {
        flex: 0 0 150px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .footer-socials {
        display: flex;
        gap: 15px;
    }

    .footer-socials a img {
        transition: transform 0.3s ease;
    }

    .footer-socials a:hover img {
        transform: translateY(-3px);
    }

    /* CENTRE : Groupement des colonnes de liens */
    .footer-links-group {
        flex: 1;
        display: flex;
        justify-content: space-around;
        gap: 30px;
        min-width: 500px;
    }

    .footer-section {
        text-align: left;
    }

    .footer-section h2 {
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
        color: #1a1a1a;
        position: relative;
    }

    .footer-section h2::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 30px;
        height: 2px;
        background: #d10f1c; 
    }

    .footer-section p,
    .footer-section ul li a {
        font-size: 14px;
        color: #555555;
        line-height: 1.8;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section ul li a:hover {
        color: #d10f1c;
    }

    /* DROITE : Carte Google Maps */
    .footer-map {
        flex: 0 0 350px;
    }

    .footer-map h2 {
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 20px;
        color: #1a1a1a;
    }

    .footer-map iframe {
        width: 100%;
        height: 180px;
        border-radius: 12px;
        border: none;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .footer-bottom {
        max-width: 1400px;
        margin: 50px auto 0;
        padding: 20px 40px 0;
        border-top: 1px solid #eeeeee;
        text-align: center;
    }

    .copyright {
        font-size: 13px;
        color: #999;
    }

    .copyright a {
        color: #999;
        text-decoration: none;
        margin: 0 8px;
        transition: color 0.3s ease;
    }

    .copyright a:hover {
        color: #d10f1c;
    }

    @media (max-width: 1024px) {
        .footer-links-group {
            min-width: 100%;
            order: 2;
        }
        .footer-map {
            order: 3;
            flex: 1 1 100%;
        }
    }

    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .footer-brand {
            align-items: center;
            flex: 1 1 100%;
        }
        .footer-section {
            text-align: center;
        }
        .footer-section h2::after {
            left: 50%;
            transform: translateX(-50%);
        }
        .footer-links-group {
            flex-direction: column;
            gap: 40px;
        }
    }
</style>

<footer class="footer" role="contentinfo">
    <div class="footer-container">

        <div class="footer-brand">
            <div class="footer-logo">
                <img src="<?= ROOT_URL ?>Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="60">
            </div>
            <div class="footer-socials">
                <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram">
                    <img src="<?= ROOT_URL ?>Site/images/instagram.png" alt="Instagram" width="24" height="24">
                </a>
                <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok">
                    <img src="<?= ROOT_URL ?>Site/images/tiktok.png" alt="TikTok" width="26" height="26">
                </a>
            </div>
        </div>

        <div class="footer-links-group">
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="<?= ROOT_URL ?>index.php#accueil">Accueil</a></li>
                    <li><a href="<?= ROOT_URL ?>index.php#histoire">Notre histoire</a></li>
                    <li><a href="<?= ROOT_URL ?>Site/Controleurs/liste_produits.php">Nos produits</a></li>
                    <li><a href="<?= ROOT_URL ?>Site/Vues/Promotions.php">Promotions</a></li>
                    <li><a href="<?= ROOT_URL ?>Site/Vues/ClickAndCollect.php">Click & Collect</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h2>Horaires</h2>
                <p>Lun & Dim : Fermé</p>
                <p>Mar - Sam : 09h30 - 13h00</p>
                <p>15h30 - 19h00</p>
                <p>Vendredi : 09h30 - 12h30,<br> 15h30 - 19h00</p>
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
            <a href="<?= ROOT_URL ?>Site/Vues/cgu.php">CGU</a> • 
            <a href="<?= ROOT_URL ?>Site/Vues/rgpd.php">RGPD</a> • 
            <a href="<?= ROOT_URL ?>Site/Vues/mentions-legales.php">Mentions légales</a>
        </p>
    </div>
</footer>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        menuToggle.addEventListener('click', () => {
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
        });

        const header = document.querySelector('.header');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) header.classList.add('header-scrolled');
            else header.classList.remove('header-scrolled');
        });
    </script>
</body>
</html>