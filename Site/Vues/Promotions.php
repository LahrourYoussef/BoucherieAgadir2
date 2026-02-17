<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 2022. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Promotions</title>
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
                    <img src="/Site/images/panier.svg" alt="Panier" class="icon" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
                <a href="/Site/Controleurs/admin/auth.php" class="cart-button" aria-label="Mon Compte">
                    <img src="/Site/images/compte2.png" alt="Compte" class="icon-account" />
                </a>
            </div>
        </div>
    </header>

    <section class="promotions" id="promotions">
            <div class="container">
                <div class="section-header">
                    <span class="section-tagline">OFFRES SPÉCIALES</span>
                    <h2>Promotions du Moment</h2>
                </div>
                <div class="promotions-grid">
                    <div class="promo-card promo-large">
                        <div class="promo-content">
                            <span class="promo-badge">-20%</span>
                            <h3>Pack Famille</h3>
                            <p>Assortiment de viandes variées pour toute la famille. Idéal pour les repas de la semaine.</p>
                            <div class="promo-price">
                                <span class="old-price">89,90 €</span>
                                <span class="new-price">71,90 €</span>
                            </div>
                            <button class="cta cta-white">Profiter de l'offre</button>
                        </div>
                        
                    </div>
                    <div class="promo-card">
                        <span class="promo-badge">-15%</span>
                        <h3>Week-end BBQ</h3>
                        <p>Brochettes et saucisses pour vos barbecues</p>
                        <div class="promo-price">
                            <span class="old-price">24,90 €</span>
                            <span class="new-price">21,15 €</span>
                        </div>
                        <button class="cta cta-white">Voir l'offre</button>
                    </div>
                    <div class="promo-card">
                        <span class="promo-badge">-10%</span>
                        <h3>Première Commande</h3>
                        <p>Réduction spéciale pour les nouveaux clients</p>
                        <div class="promo-price">
                            <span class="new-price">Code: BIENVENUE10</span>
                        </div>
                        <button class="cta cta-white">Utiliser le code</button>
                    </div>
                </div>
            </div>
        </section>


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

    <script>
        // Menu mobile toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
        });

        // Sticky header
        const header = document.querySelector('.header');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            if (currentScroll > 100) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
            lastScroll = currentScroll;
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>