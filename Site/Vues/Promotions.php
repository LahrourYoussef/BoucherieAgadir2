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
    <?php include __DIR__ . '/header.php'; ?>

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