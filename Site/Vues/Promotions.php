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
<?php include __DIR__ . '/footer.php'; ?>

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