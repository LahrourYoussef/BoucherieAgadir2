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
    <?php include __DIR__ . '/Site/Vues/header.php'; ?>

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
                        <a href="Site/Controleurs/liste_produits.php">Voir notre sélection</a>
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

    <script src="<?= ROOT_URL ?>Site/js/script.js"></script>
</body>
</html>