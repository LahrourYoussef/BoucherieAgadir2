<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 1997. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Boucherie Agadir - Viande Fraîche depuis 1997</title>
    <link rel="stylesheet" href="Site/Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
                BOUCHERIE<span>AGADIR</span>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
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
                    <span class="tagline" aria-label="Depuis 1997">VIANDE FRAÎCHE DEPUIS 1997</span>
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
                        <strong>4,9/5</strong> – Basé sur 213 avis
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
                            Depuis 1997, la Boucherie Agadir est votre partenaire de confiance pour une viande de qualité exceptionnelle.
                        </p>
                        <p>
                            Fondée avec passion par des artisans bouchers expérimentés, notre boucherie allie tradition et modernité. 
                            Nous sélectionnons rigoureusement nos viandes auprès d'éleveurs locaux qui partagent nos valeurs de respect 
                            animal et d'excellence.
                        </p>
                        <p>
                            Chaque jour, nos maîtres bouchers préparent avec soin une large gamme de produits : viandes fraîches, 
                            plats cuisinés, charcuteries artisanales et spécialités maison. Notre engagement ? Vous offrir le meilleur 
                            du goût et de la fraîcheur.
                        </p>
                        <div class="stats">
                            <div class="stat-item">
                                <div class="stat-number">27</div>
                                <div class="stat-label">Années d'expérience</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">5000+</div>
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
                        <div class="promo-image">
                            <img src="Site/images/viande1.jpg" alt="Pack famille" loading="lazy">
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

        <section class="contact" id="contact">
            <div class="container">
                <div class="section-header">
                    <span class="section-tagline">CONTACTEZ-NOUS</span>
                    <h2>Nous Contacter</h2>
                    <p class="section-description">Une question ? Une demande spéciale ? N'hésitez pas à nous contacter.</p>
                </div>
                <div class="contact-grid">
                    <div class="contact-card">
                        <div class="contact-icon">📍</div>
                        <h3>Adresse</h3>
                        <p>123 Rue de la Boucherie<br>75001 Paris, France</p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">📞</div>
                        <h3>Téléphone</h3>
                        <p>01 23 45 67 89<br>Lun-Sam : 8h-19h</p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">✉️</div>
                        <h3>Email</h3>
                        <p>contact@boucherieagadir.fr<br>Réponse sous 24h</p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">🕒</div>
                        <h3>Horaires</h3>
                        <p>Lundi - Samedi : 8h - 19h<br>Dimanche : 9h - 13h</p>
                    </div>
                </div>
                <div class="contact-form-container">
                    <form class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nom complet</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Sujet</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="cta">Envoyer le message</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer" role="contentinfo">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Boucherie Agadir</h3>
                <p>Votre boucher de confiance depuis 1997</p>
            </div>
            <div class="footer-section">
                <h4>Horaires</h4>
                <p>Lun - Sam : 8h - 19h</p>
                <p>Dimanche : 9h - 13h</p>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <p>Email : contact@boucherieagadir.fr</p>
                <p>Tél : 01 23 45 67 89</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Boucherie Agadir. Tous droits réservés.</p>
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