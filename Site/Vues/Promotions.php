<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 2022. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Promotions</title>
    <link rel="stylesheet" href="../Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
              <a href="../../index.php"><img src="../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="#" class="nav-link">Notre histoire</a>
                <a href="#produits" class="nav-link">Nos produits</a>
                <a href="#promotions" class="nav-link">Promotions</a>
                <a href="ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="../images/www.apple.com-27.svg" alt="Panier" class="icon" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
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


     <footer class="footer" role="contentinfo">
        <div class="footer-container">
    
            <!-- LOGO + DESCRIPTION -->
            <div class="footer-section">
                    <img src="../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" >
    
                <div class="footer-socials">
                    <a href="#" aria-label="Instagram">📸</a>
                    <a href="#" aria-label="TikTok">🎵</a>
                </div>
            </div>
    
            <!-- PLAN DU SITE -->
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Notre histoire</a></li>
                    <li><a href="#">Nos produits</a></li>
                    <li><a href="#">Promotions</a></li>
                    <li><a href="#">Click & Collect</a></li>
                    <li><a href="#">Contact</a></li>
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
            <p>
                Tous droits réservés • 
                <a href="#">CGU</a> • 
                <a href="#">RGPD</a> • 
                <a href="#">Mentions légales</a>
            </p>
            <p class="dev">
                Développé par <strong>BTS SIO 2</strong>
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