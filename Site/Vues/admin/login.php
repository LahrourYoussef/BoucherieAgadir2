<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Boucherie Agadir</title>
    <link rel="stylesheet" href="../../Styles/style.css">
</head>
<body>

<header class="header" role="banner">
    <div class="header-container">
        <div class="logo" aria-label="Boucherie Agadir">
            <img src="../../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px"> 
        </div>
        
        <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <nav class="nav" role="navigation" aria-label="Navigation principale">
            <a href="../../index.php#boucherie" class="nav-link">La Boucherie</a>
            <a href="../../index.php#produits" class="nav-link">Nos produits</a>
            <a href="../../index.php#promotions" class="nav-link">Promotions</a>
            <a href="../ClickAndCollect.php" class="nav-link">Click & Collect</a>
            <a href="../Contact.php" class="nav-link">Contact</a>
        </nav>
        
        <div class="icons">
            <button class="cart-button" aria-label="Panier d'achat">
                <img src="../../images/panier.svg" alt="Panier" class="icon" />
                <span class="cart-badge" aria-hidden="true">0</span>
            </button>
        </div>
    </div>
</header>

<main>
    <div class="publication-container">
        <h2>Connexion Administration</h2>

        <?php if ($error): ?>
            <p style="color:red; font-weight:bold; text-align:center;"> <?= htmlspecialchars($error) ?> </p>
        <?php endif; ?>

        <form method="POST" action="../../Controleurs/admin/auth.php">
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="password" name="password" placeholder="Mot de passe" required><br><br>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</main>

<footer class="footer" role="contentinfo">
    <div class="footer-container">
        <div class="footer-section">
            <div class="logo" aria-label="Boucherie Agadir">
                BOUCHERIE<span>AGADIR</span>
            </div>
            <p>Votre boucher de confiance depuis 1997</p>

            <div class="footer-socials">
                <a href="#" aria-label="Facebook">📘</a>
                <a href="#" aria-label="Instagram">📸</a>
                <a href="#" aria-label="TikTok">🎵</a>
            </div>
        </div>

        <div class="footer-section">
            <h2>Plan du site</h2>
            <ul>
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="../liste_produit.php">Produits</a></li>
                <li><a href="../ClickAndCollect.php">Click & Collect</a></li>
                <li><a href="../Contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h2>Horaires</h2>
            <p>Lundi : Fermé</p>
            <p>Mardi au Samedi : <br>09h30 - 13h00, 15h30 - 19h00</p>
            <p>Dimanche : Fermé</p>
        </div>

        <div class="footer-section">
            <h2>Contact</h2>
            <p>Email : Ben20mohamed97@gmail.com</p>
            <p>Tél : 06 27 29 85 56</p>
            <p>📍 14 Pl. du Béarn, 64150 Mourenx</p>
        </div>

        <div class="footer-section footer-map">
            <h2>Nous trouver</h2>
            <iframe src="https://www.google.com/maps/embed?pb=..." loading="lazy"></iframe>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2024 Boucherie Agadir — Tous droits réservés • <a href="#">CGU</a> • <a href="#">RGPD</a></p>
        <p class="dev">Développé par <strong>BTS SIO 2</strong></p>
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
</script>

</body>
</html>