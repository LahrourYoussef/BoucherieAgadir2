<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 2022. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Accueil</title>
    <link rel="stylesheet" href="Site/Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
                <a href="#accueil"><img src="Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="#histoire" class="nav-link">Notre histoire</a>
                <a href="Site/Controleurs/liste_produits.php">Nos produits</a>
                <a href="Site/Vues/Promotions.php" class="nav-link">Promotions</a>
                <a href="Site/Vues/ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="Site/Vues/Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="Site/images/panier.png" alt="Panier" class="icon-cart" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
                <a href="Site/Controleurs/admin/auth.php" class="cart-button" aria-label="Mon Compte">
                    <img src="Site/images/compte2.png" alt="Compte" class="icon-account" />
                </a>
            </div>
        </div>
    </header>

    <main>
        <section class="hero" id="accueil">
            <div class="hero-container">
                <div class="hero-text">
                    <span class="tagline" aria-label="Depuis 2022">VIANDE FRAÎCHE DEPUIS 2022</span>
                    <h1>Une viande fraîche et de qualité<br>chaque jour chez votre boucher</h1>
                    <p>
                        Une sélection rigoureuse de viandes fraîches, préparées avec soin dans notre boucherie,
                        pour garantir goût et fraîcheur.
                    </p>
                    <button class="cta" aria-label="Voir notre sélection de produits">
                        Voir notre sélection 
                    </button>
                    <div class="reviews" role="region" aria-label="Avis clients">
                        <div class="stars-outer">
                        <div class="stars-inner" style="width: 88%;"></div> </div>
                        <strong>4,4/5</strong> – Basé sur 16 avis avis Google
                    </div>
                </div>
                
                <div class="hero-images">
                    <div class="card card-left" aria-hidden="true">
                        <img src="Site/images/viande1.jpg" alt="Viande fraîche de qualité" loading="lazy">
                    </div>
                    <div class="card card-right" aria-hidden="true">
                        <img src="Site/images/viande2.webp" alt="Viande préparée avec soin" loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        <section class="about" id="histoire">
            <div class="container">
                <div class="section-header">
                    <span class="about-tagline">NOTRE HISTOIRE</span>
                    <h2>La Boucherie Agadir</h2>
                </div>
                <div class="about-content">
                    <div class="about-text">
                        <p class="lead">
                            Depuis 2022, la Boucherie Agadir est votre partenaire de confiance pour une viande de qualité exceptionnelle.
                        </p>
                        <p>
                            Fondée avec passion par un artisan boucher expérimenté, notre boucherie allie tradition et modernité. 
                            Nous sélectionnons rigoureusement nos viandes auprès d’éleveurs locaux qui partagent nos valeurs de respect 
                            animal et d’excellence.
                        </p>
                        <p>
                            Chaque jour, notre maître boucher prépare avec soin une large gamme de produits : viandes fraîches, plats cuisinés
                            et spécialités maison. Notre engagement ? Vous offrir le meilleur du goût et de la fraîcheur.
                        </p>
                        <div class="stats">
                            <div class="stat-item">
                                <div class="stat-number">4</div>
                                <div class="stat-label">Années d'expérience</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">100+</div>
                                <div class="stat-label">Clients satisfaits</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Viande fraîche</div>
                            </div>
                        </div>
                    </div>
                    <div class="about-image">
                        <div class="image-card">
                            <img src="Site/images/viande1.jpg" alt="Notre boucherie" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="products" id="produits">
    <div class="container">
        <div class="section-header">
            <span class="products-tagline">NOTRE SÉLECTION</span>
            <h2>Nos Produits</h2>
            <p class="products-description">Découvrez nos dernières nouveautés .</p>
        </div>

        <div class="products-grid">
            <?php
            try {
                require_once 'config.php'; // Connexion à la base
                // On récupère uniquement les 3 derniers produits
                $stmt = $pdo->query("SELECT * FROM Produit ORDER BY Id_Produit DESC LIMIT 3");
                $home_products = $stmt->fetchAll();

                if (!empty($home_products)): 
                    foreach ($home_products as $produit): ?>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="Site/uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>" alt="<?= htmlspecialchars($produit['Nom_Produit']) ?>">
                            </div>
                            <div class="product-info">
                                <h3><?= htmlspecialchars($produit['Nom_Produit']) ?></h3>
                                <p><?= htmlspecialchars($produit['Description_Produit']) ?></p>
                                <div class="product-footer">
                                    <span class="product-price"><?= htmlspecialchars($produit['Prix_Unitaire']) ?> € / <?= htmlspecialchars($produit['Unite_Vente']) ?></span>
                                    <a href="Site/Controleurs/details_produits.php?id=<?= $produit['Id_Produit'] ?>" class="product-btn">Détails</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; 
                else: ?>
                    <p style="text-align:center; color:#f5f2ed; width:100%;">Aucun produit disponible pour le moment.</p>
                <?php endif; 
            } catch (Exception $e) {
                echo "<p style='color:white;'>Erreur de chargement des produits.</p>";
            } ?>
        </div>

        <div class="product-footer-button" style="text-align: center; margin-top: 40px;">
            <a href="Site/Controleurs/liste_produits.php"><button class="btn-voir-produits">Voir tous nos produits</button></a>
        </div>
    </div>
</section>

        <section class="testimonials">
            <div class="container">
                <div class="section-header">
                    <span class="testimonials-tagline">TÉMOIGNAGES</span>
                    <h2>Ce que disent nos clients</h2>
                </div>
                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <div class="stars-outer">
                                <div class="stars-inner" style="width: 100%;"></div>
                            </div>
                        </div>
                        <p class="testimonial-text">
                            "Viande et service de qualité !
                            Que du bonheur ."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">C</div>
                            <div class="author-info">
                                <div class="author-name">Claude FUMENIA</div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <div class="stars-outer">
                                <div class="stars-inner" style="width: 80%;"></div>
                            </div>
                        </div>
                        <p class="testimonial-text">
                            Client satisfait 
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">N</div>
                            <div class="author-info">
                                <div class="author-name">Noureddine EL MAAROUFI</div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <div class="stars-outer">
                                <div class="stars-inner" style="width: 100%;"></div>
                            </div>
                        </div>
                        <p class="testimonial-text">
                            Client satisfait 
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">S</div>
                            <div class="author-info">
                                <div class="author-name">Siham Aissa</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="click-collect" id="click-collect">
            <div class="container">
                <div class="click-collect-content">
                    <div class="click-collect-text">
                        <span class="click-collect-tagline">SERVICE RAPIDE</span>
                        <h2>Click & Collect</h2>
                        <p class="lead">
                            Commandez en ligne et récupérez vos produits frais en magasin. Simple, rapide et pratique !
                        </p>
                        <ul class="features-list">
                            <li>
                                <span class="feature-icon">✓</span>
                                <span>Commande en ligne 24/7</span>
                            </li>
                            <li>
                                <span class="feature-icon">✓</span>
                                <span>Préparation le jour même</span>
                            </li>
                            <li>
                                <span class="feature-icon">✓</span>
                                <span>Retrait sans attente</span>
                            </li>
                            <li>
                                <span class="feature-icon">✓</span>
                                <span>Paiement en ligne sécurisé</span>
                            </li>
                        </ul>
                        <a href="Site/Vues/ClickAndCollect.php" class="cta">Commander maintenant</a>
                    </div>
                    <div class="click-collect-visual">
                        <div class="visual-card">
                            <div class="step">
                                <div class="step-number">1</div>
                                <div class="step-text">Choisissez vos produits</div>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-text">Validez votre commande</div>
                            </div>
                            <div class="step">
                                <div class="step-number">3</div>
                                <div class="step-text">Récupérez en magasin</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    

    <!-- <footer class="footer" role="contentinfo">
        <div class="footer-container">
    
            <div class="footer-top">
                <div class="footer-logo">
                    <img src="Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px">
                </div>
                <div class="footer-socials">
                    <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram"><img src="Site/images/instagram.png" alt="Instagram" style="width: 33px; height: 33px;"></a>
                    <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok"><img src="Site/images/tiktok.png" alt="TikTok" style="width: 36px; height: 36px;"></a>
                </div>
            </div>
    
            <div class="footer-links">
                <div class="footer-section">
                    <h2>Plan du site</h2>
                    <ul>
                        <li><a href="#accueil">Accueil</a></li>
                        <li><a href="#histoire">Notre histoire</a></li>
                        <li><a href="#produits">Nos produits</a></li>
                        <li><a href="Site/Vues/Promotions.php">Promotions</a></li>
                        <li><a href="Site/Vues/ClickAndCollect.php">Click & Collect</a></li>
                        <li><a href="Site/Vues/Contact.php">Contact</a></li>
                    </ul>
                </div>
        
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
        
                <div class="footer-section">
                    <h2>Contact</h2>
                    <p>Ben20mohamed97@gmail.com</p>
                    <p>06 27 29 85 56</p>
                    <p>14 Pl. du Béarn, 64150 Mourenx</p>
                </div>
            </div>
    
            <div class="footer-map">
                <h2>Nous trouver</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2900.274367843064!2d-0.6325365238468116!3d43.37128687111687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd56f651fe5aaaab%3A0x91bd7d0d97301f1a!2sBoucherie%20halal%20Mourenx!5e0!3m2!1sfr!2sfr!4v1771267825731!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    
        </div>
    
        <div class="footer-bottom">
            <p class="copyright">
                Tous droits réservés • 
                <a href="#">CGU</a> • 
                <a href="#">RGPD</a> • 
                <a href="#">Mentions légales</a>
            </p>
            
        </div>
    </footer> -->

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

    /* Petit trait décoratif sous les titres */
    .footer-section h2::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 30px;
        height: 2px;
        background: #d10f1c; /* Couleur primaire */
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

    /* BAS : Copyright et Liens légaux */
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

    /* RESPONSIVE : Tablettes et Mobiles */
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
                <img src="Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="60">
            </div>
            <div class="footer-socials">
                <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram">
                    <img src="Site/images/instagram.png" alt="Instagram" width="24" height="24">
                </a>
                <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok">
                    <img src="Site/images/tiktok.png" alt="TikTok" width="26" height="26">
                </a>
            </div>
        </div>

        <div class="footer-links-group">
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="index.php#accueil">Accueil</a></li>
                    <li><a href="index.php#histoire">Notre histoire</a></li>
                    <li><a href="Site/Controleurs/liste_produits.php">Nos produits</a></li>
                    <li><a href="Site/Vues/Promotions.php">Promotions</a></li>
                    <li><a href="Site/Vues/ClickAndCollect.php">Click & Collect</a></li>
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
            
            <a href="Site/Vues/cgu.php">CGU</a> • 
            <a href="Site/Vues/rgpd.php">RGPD</a> • 
            <a href="Site/Vues/mentions-legales.php">Mentions légales</a>
        </p>
    </div>
</footer>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        const body = document.body;
        
        if (menuToggle && nav) {
            menuToggle.addEventListener('click', () => {
                const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
                const isOpen = !isExpanded;
                
                menuToggle.setAttribute('aria-expanded', isOpen);
                nav.classList.toggle('nav-open');
                menuToggle.classList.toggle('active');
                
                if (isOpen) {
                    body.classList.add('menu-open');
                    body.style.overflow = 'hidden';
                } else {
                    body.classList.remove('menu-open');
                    body.style.overflow = '';
                }
            });
            
            const navLinks = nav.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        menuToggle.setAttribute('aria-expanded', 'false');
                        nav.classList.remove('nav-open');
                        menuToggle.classList.remove('active');
                        body.classList.remove('menu-open');
                        body.style.overflow = '';
                    }
                });
            });
        }

        const header = document.querySelector('.header');
        if (header) {
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 100) {
                    header.classList.add('header-scrolled');
                } else {
                    header.classList.remove('header-scrolled');
                }
            }, { passive: true });
        }
    </script>
</body>
</html>