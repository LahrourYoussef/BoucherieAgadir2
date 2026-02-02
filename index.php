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
                <img src="Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" > 
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="#" class="nav-link">Notre histoire</a>
                <a href="#produits" class="nav-link">Nos produits</a>
                <a href="Site/Vues/Promotions.php" class="nav-link">Promotions</a>
                <a href="Site/Vues/ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="Site/Vues/Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="Site/images/www.apple.com-27.svg" alt="Panier" class="icon" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
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
                        <span class="cta-arrow">→</span>
                    </button>
                    <div class="reviews" role="region" aria-label="Avis clients">
                        <div class="stars" aria-hidden="true">⭐⭐⭐⭐☆</div>
                        <strong>4,9/5</strong> – Basé sur 16 avis
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

        <section class="about" id="boucherie">
            <div class="container">
                <div class="section-header">
                    <span class="section-tagline">NOTRE HISTOIRE</span>
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
                    <span class="section-tagline">NOTRE SÉLECTION</span>
                    <h2>Nos Produits</h2>
                    <p class="section-description">Découvrez notre gamme complète de viandes et spécialités</p>
                </div>
                <div class="products-grid">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="Site/images/viande1.jpg" alt="Bœuf premium" loading="lazy">
                            <span class="product-badge">Nouveau</span>
                        </div>
                        <div class="product-info">
                            <h3>Bœuf Premium</h3>
                            <p>Viande de bœuf sélectionnée, tendre et savoureuse</p>
                            <div class="product-footer">
                                <span class="product-price">24,90 € / kg</span>
                                <button class="product-btn">Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="Site/images/viande2.webp" alt="Agneau de qualité" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3>Agneau de Qualité</h3>
                            <p>Gigot et côtelettes d'agneau, élevage local</p>
                            <div class="product-footer">
                                <span class="product-price">18,50 € / kg</span>
                                <button class="product-btn">Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="Site/images/viande1.jpg" alt="Porc fermier" loading="lazy">
                            <span class="product-badge promo">-15%</span>
                        </div>
                        <div class="product-info">
                            <h3>Porc Fermier</h3>
                            <p>Viande de porc élevée en plein air, goût authentique</p>
                            <div class="product-footer">
                                <span class="product-price">
                                    <span class="old-price">16,90 €</span>
                                    14,35 € / kg
                                </span>
                                <button class="product-btn">Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="Site/images/viande2.webp" alt="Volaille bio" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3>Volaille Bio</h3>
                            <p>Poulet et dinde certifiés bio, élevage responsable</p>
                            <div class="product-footer">
                                <span class="product-price">12,90 € / kg</span>
                                <button class="product-btn">Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="Site/images/viande1.jpg" alt="Charcuterie artisanale" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3>Charcuterie Artisanale</h3>
                            <p>Saucissons, jambons et terrines maison</p>
                            <div class="product-footer">
                                <span class="product-price">À partir de 8,50 €</span>
                                <button class="product-btn">Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="Site/images/viande2.webp" alt="Plats préparés" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3>Plats Préparés</h3>
                            <p>Daubes, ragoûts et spécialités cuisinées maison</p>
                            <div class="product-footer">
                                <span class="product-price">À partir de 6,90 €</span>
                                <button class="product-btn">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials">
            <div class="container">
                <div class="section-header">
                    <span class="section-tagline">TÉMOIGNAGES</span>
                    <h2>Ce que disent nos clients</h2>
                </div>
                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                        <p class="testimonial-text">
                            "Excellente boucherie ! La qualité de la viande est remarquable et le service est toujours au rendez-vous. 
                            Je recommande vivement."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">M</div>
                            <div class="author-info">
                                <div class="author-name">Marie Dubois</div>
                                <div class="author-location">Client depuis 5 ans</div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                        <p class="testimonial-text">
                            "La meilleure boucherie du quartier ! Les produits sont toujours frais et les conseils des bouchers 
                            sont précieux. Un vrai plaisir."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">J</div>
                            <div class="author-info">
                                <div class="author-name">Jean Martin</div>
                                <div class="author-location">Client depuis 3 ans</div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                        <p class="testimonial-text">
                            "Qualité exceptionnelle et prix raisonnables. Les plats préparés sont délicieux et la viande 
                            est toujours tendre. Je ne vais nulle part ailleurs !"
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">S</div>
                            <div class="author-info">
                                <div class="author-name">Sophie Bernard</div>
                                <div class="author-location">Client depuis 2 ans</div>
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
                        <span class="section-tagline">SERVICE RAPIDE</span>
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
                        <button class="cta">Commander maintenant</button>
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

    <footer class="footer" role="contentinfo">
        <div class="footer-container">
    
            <!-- LOGO + DESCRIPTION -->
            <div class="footer-section">
                    <img src="Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" >
    
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

    <div id='contenu'>
			<?php
			// si aucune information n'est présente dans l'url, le controleur par défaut sera 'accueil'
			if (isset($_GET['controleur']))
				$controleur = filter_var($_GET['controleur'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			else
				$controleur = 'general';

			switch ($controleur) {
				case 'general':
					include_once 'vues/accueil.html';
					break;
				case 'developpeurs':
					include_once 'controleurs/gestionDeveloppeurs.php';
					break;
				case 'competence':
					include_once 'controleurs/gestionCompetence.php';
					break;
			}


			?>

		</div>

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