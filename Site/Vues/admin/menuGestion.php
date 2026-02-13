<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Boucherie Agadir</title>
    <link rel="stylesheet" href="../../Styles/style.css">
</head>
<body>

    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
                <a href="../../index.php"><img src="../../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="../../index.php#histoire" class="nav-link">Notre histoire</a>
                <a href="../../Controleurs/liste_produits.php" class="nav-link">Nos produits</a>
                <a href="../Promotions.php" class="nav-link">Promotions</a>
                <a href="../ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="../Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="../../images/panier.png" alt="Panier" class="icon-cart" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
                <a href="users.php" class="cart-button" aria-label="Mon Compte">
                    <img src="../../images/compte2.png" alt="Compte" class="icon-account" />
                </a>
            </div>
        </div>
    </header>

    <main>
        <center> 
            <h1 class="headMenu">Bienvenue sur le menu de gestion <?= htmlspecialchars($nomAdmin) ?></h1>
        </center> 
        <br>

        <section class="products-grid" style="padding: 50px 20px; max-width: 1200px; margin: auto;">
            <div class="product-card">
                <div class="product-image">
                    <img src="../../images/produit.png" alt="Illustration produits">
                </div>
                <div class="product-info">
                    <h3>Gestion des produits</h3>
                    <div class="product-footer">
                        <a href="produits_admin.php" class="product-btn" style="text-decoration: none; text-align: center; width: 100%;">Gérer</a>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="../../images/post.png" alt="Illustration posts">
                </div>
                <div class="product-info">
                    <h3>Gestion des posts</h3>
                    <div class="product-footer">
                        <a href="#" class="product-btn" style="text-decoration: none; text-align: center; width: 100%;">Gérer</a>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="../../images/user.png" alt="Illustration users">
                </div>
                <div class="product-info">
                    <h3>Gestion des users (admin)</h3>
                    <div class="product-footer" style="display: flex; gap: 10px;">
                        <a href="register.php" class="product-btn" style="text-decoration: none; text-align: center; flex: 1;">Ajouter</a>
                        <a href="users.php" class="product-btn" style="text-decoration: none; text-align: center; flex: 1;">Gérer</a>
                    </div>
                </div>
            </div>
        </section>

        <center>
            <p class="headMenu">Cliquer pour vous déconnecter 👇</p> <br>
            <button id="buttonDeco"><a href="../../Controleurs/admin/logout.php" >Déconnexion</a></button>
        </center> 
        <br><br>
    </main>
<footer class="footer" role="contentinfo">
        <div class="footer-container">
    
            <!-- LOGO + DESCRIPTION -->
            <div class="footer-section">
                    <img src="../../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" >
    
                <div class="footer-socials">
                    <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram"><img src="../../images/instagram.png" alt="Instagram" style="width: 33px; height: 33px;"></a>
                    <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok"><img src="../../images/tiktok.png" alt="TikTok" style="width: 36px; height: 36px;"></a>
                </div>
            </div>
    
            <!-- PLAN DU SITE -->
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="../../index.php">Accueil</a></li>
                    <li><a href="../../index.php#histoire">Notre histoire</a></li>
                    <li><a href="../../Controleurs/liste_produits.php">Nos produits</a></li>
                    <li><a href="../Promotions.php">Promotions</a></li>
                    <li><a href="../ClickAndCollect.php">Click & Collect</a></li>
                    <li><a href="../Contact.php">Contact</a></li>
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
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>